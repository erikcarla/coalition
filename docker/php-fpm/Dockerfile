FROM php:7.0.24-fpm


RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client git   \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-install mcrypt pdo_mysql \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd

WORKDIR /var/www
