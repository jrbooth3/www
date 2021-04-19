FROM php:7.4.13-apache-buster
# update and install php
RUN apt update
RUN apt -y upgrade
RUN apt install -y apt-utils readline-common net-tools nano bash
expose 80
# overwrite the default-configuration with our own settings - enabling PHP
#ADD default /etc/nginx/sites-available/default
ADD www /var/www/html
