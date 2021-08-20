FROM schoeffm/rpi-nginx:debian
MAINTAINER Stefan Schoeffmann <stefan.schoeffmann@posteo.de>
# to remove errors with build
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
#RUN apt update
#RUN apt -y upgrade
RUN apt install -y net-tools apt-utils nano curl readline-common bash
#php php-fpm php-common php-mysql php-cli php-gd php-curl php-mbstring php-zip php-apcu php-imagick php-intl php-xml php-json php-pgsql
expose 80 8080
# overwrite the default-configuration with our own settings - enabling PHP
#ADD ~code/www/www2 /etc/nginx/sites-enabled/default
#ADD ~code/www/wwwd2 /etc/nginx/sites-enabled/wwwd
#ADD ~code/www/tdi2 /etc/nginx/sites-enabled/tdi
#ADD ~code/www/tdid2 /etc/nginx/sites-enabled/tdid
ADD ~code/www/www /usr/share/nginx/www
ADD ~code/www/tdi /usr/share/nginx/tdi
CMD service php7.3-fpm start && nginx
