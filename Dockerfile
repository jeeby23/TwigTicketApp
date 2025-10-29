# Use official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql mbstring \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy your app
COPY . /var/www/html/

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Run Composer install
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public