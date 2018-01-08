# Raspbian customised with Logbox HAT connectivity

## Install automatically:

1. Download the latest LogBox OS image from: https://github.com/BrightFlair/logbox-os/releases
2. Flash the pi with LogBox OS image using something like [Etcher][etcher].
3. Done!

## Install manually from scratch:

1. Download latest *lite* zipped image from: https://www.raspberrypi.org/downloads/raspbian/
2. Flash the pi with Raspbian.
3. [Enable SSH and log in][ssh] to the newly flashed Pi (username pi, password raspberry).
4. Run the following command (CHANGE THE PASSWORD!)

```
LOGBOX_PASSWORD="change-this" bash <(curl -s https://raw.githubusercontent.com/BrightFlair/logbox-os/master/install)
```

The script takes ~ 25 minutes to complete. Once the script is complete, the pi will be set to automatically execute `boot`, which will keep it up to date.

[etcher]: https://etcher.io/
[ssh]: https://www.raspberrypi.org/documentation/remote-access/ssh/ 
