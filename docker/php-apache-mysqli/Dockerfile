FROM php:7.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# docker build -t php:7.2-apache-mysqli
# docker run -d -p <port>:80 --name <name> -v <dir/with/working/files>:/var/www/html php:7.2-apache-mysqli