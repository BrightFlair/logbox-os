#!/bin/bash
temp=$(mktemp /tmp/logbox-data.XXXXX)
host=$(hostname)
/home/logbox/os/get-data.php > $temp
scp -o StrictHostKeyChecking=no -i ~/.ssh/id_logbox $temp logbox@dhp.srv.brightflair.com:/var/www/data.logbox/data/$host.txt
ssh -o StrictHostKeyChecking=no -i ~/.ssh/id_logbox logbox@dhp.srv.brightflair.com "chmod 644 /var/www/data.logbox/data/$host.txt"
rm $temp
