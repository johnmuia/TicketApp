#!/bin/sh
apt-get install apache2 -y
systemctl start apache2
systemctl status apache2
