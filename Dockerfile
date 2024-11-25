FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql zip

# Instalar o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite