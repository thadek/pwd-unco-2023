FROM php:8.2-apache
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    git \
    unzip


COPY . /var/www/html
EXPOSE 80

RUN mv ./php.ini "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install exif

RUN chown -R www-data:www-data /var/www/html


