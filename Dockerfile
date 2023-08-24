FROM php:8.0-apache
WORKDIR /var/www/html

COPY tp1/ tp1
EXPOSE 80
VOLUME /var/www/html

