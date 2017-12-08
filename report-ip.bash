#!/bin/bash
ip="$(hostname -I | cut -d' ' -f1)"
hostname="$(hostname)"
curl -d "lan-ip=$ip&hostname=$hostname" -X POST http://ip.logbox.cloud
