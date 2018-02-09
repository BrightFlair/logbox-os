#!/bin/bash

set -e

logbox_home=/home/logbox

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

until /home/logbox/os/report-ip.bash
do
	echo "Waiting for internet..."
	sleep 1
done

# TODO: Set up WiFi if config file exists.

# Update all components
declare -a component_list=("avr" "hat" "hat-update" "os")
for component in "${component_list[@]}"
do
	cd "$logbox_home/$component"
	git pull
done
cd $logbox_home

sudo /usr/bin/logbox-hat-update

# Copy special directories
sudo rsync --delete --recursive "$logbox_home/os/cron.d" /etc/cron.d
