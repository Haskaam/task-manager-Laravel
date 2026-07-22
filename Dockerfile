FROM php:8.2-fpm

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
unzip \
libzip-dev \
&& docker-php-ext-install pdo_mysql zip

COPY composer.json composer.lock ./

RUN composer install \
--no-interaction \
--prefer-dist \
--no-scripts

COPY . .

RUN composer dump-autoload --optimize
