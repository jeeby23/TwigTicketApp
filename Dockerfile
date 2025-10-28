# Use an official PHP image with Apache
FROM php:8.2-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite (Twig often uses pretty URLs)
RUN a2enmod rewrite

# Copy the app into the container
COPY . /var/www/html/

# Install Composer dependencies
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to the public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config to use the public directory as web root