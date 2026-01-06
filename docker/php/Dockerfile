FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install

# Set permissions for Laravel

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["php-fpm"]

