#!/bin/bash

$logbox_home=/home/logbox

# Default hostname will be used to indicate setup of pi.
default_hostname="LogBox-new"
current_hostname=$(cat /etc/hostname)
if [ "$default_hostname" == "$current_hostname" ]
then
	mac=$(sed s/://gi /sys/class/net/eth0/address)
	mac=${mac:(-6)}
	hostname="LogBox-$mac"
	echo "$hostname" | sudo tee /etc/hostname
	echo -e "127.0.0.1\t$hostname" | sudo tee /etc/hosts
	
	sudo reboot
fi

# TODO: Set up WiFi if config file exists.

# Update all components
declare -a component_list=("avr" "hat" "hat-update" "os")
for component in "${component_list[@]}"
do
	cd "$logbox_home/$component"
	git pull
done
cd $logbox_home

# Remove any old links, reset original binaries, re-link updated AVR scripts.
avrdude_path="/usr/bin/avrdude"
if [ -f "$avrdude_path-original" ]
then
	sudo mv "$avrdude_path-original" "$avrdude_path"
fi
autoreset_path="/usr/bin/autoreset"
if [ -f "$autoreset_path" ]
	sudo rm "$autoreset_path"
fi
logbox_hat_update_path="/usr/bin/logbox-hat-update"
if [ -f "$logbox_hat_update_path" ]
	sudo rm "logbox_hat_update_path"
fi
sudo ln -s "$logbox_home/avr/autoreset" "$autoreset_path"
sudo mv "$avrdude_path" "$avrdude_path-original"
sudo ln -s "$logbox_home/avr/avrdude-autoreset" "$avrdude_path"
sudo ln -s "$logbox_home/hat-update/logbox-hat-update" "$logbox_hat_update_path"

# Copy special directories
sudo cp -R "$logbox_home/os/cron.d/*" /etc/cron.d
