# Raspbian customised with Logbox HAT connectivity

Based from: http://downloads.raspberrypi.org/raspbian_lite/images/raspbian_lite-2017-06-23/2017-06-21-raspbian-jessie-lite.zip

To run this script automatically, [enable SSH and log in][ssh] to the newly flashed Pi and run the following install script:

```
LOGBOX_PASSWORD="change-this" bash <(curl -s https://raw.githubusercontent.com/BrightFlair/logbox-os/master/install)
```

[ssh]: https://www.raspberrypi.org/documentation/remote-access/ssh/ 
