FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql zip

# Instalar o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Configuração do servidor web
WORKDIR /var/www/html
COPY ./public /var/www/html
COPY ./ /var/www/html

RUN a2enmod rewrite