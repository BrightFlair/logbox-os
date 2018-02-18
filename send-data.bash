#!/bin/bash
lynx -dump -nolist http://localhost/output.php | sed -e 's/.*REFRESH.*//'
scp -o StrictHostKeyChecking=no -i ~/.ssh/id_logbox /tmp/output logbox@dhp.srv.brightflair.com:~/.