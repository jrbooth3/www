FROM schoeffm/rpi-nginx:debian
MAINTAINER Stefan Schoeffmann <stefan.schoeffmann@posteo.de>
# to remove errors with build
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
RUN apt update
RUN apt -y upgrade
RUN apt install -y net-tools apt-utils php php-fpm php-common php-mysql php-cli php-gd php-curl php-mbstring php-zip php-apcu php-imagick php-intl php-xml php-json php-pgsql nano curl readline-common bash
expose 80 8080 81 8081
# overwrite the default-configuration with our own settings - enabling PHP
ADD www2 /etc/nginx/sites-enabled/default
ADD wwwd2 /etc/nginx/sites-enabled/wwwd
ADD tdi2 /etc/nginx/sites-enabled/tdi
ADD tdid2 /etc/nginx/sites-enabled/tdid
ADD www /usr/share/nginx/www
ADD tdi /usr/share/nginx/tdi
CMD service php7.3-fpm start && nginx
#CMD nginx
#fairview
#LKJSEw@4324$@4s4;ljh
