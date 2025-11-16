FROM php:8.3.16-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_pgsql zip bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
    
# Instalar Composer
ENV COMPOSER_HOME=/tmp/composer-cache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activar módulos de Apache
RUN a2enmod rewrite

# Copiar configuración personalizada (opcional)
# COPY php.ini /usr/local/etc/php/
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

