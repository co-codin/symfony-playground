FROM php:7.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y libzip-dev zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory to /app
WORKDIR /app

# Copy composer.lock and composer.json
COPY composer.lock composer.json /app/

# Install dependencies
RUN composer install --no-dev --prefer-dist

# Copy application code
COPY . /app/

# Expose port 8337
EXPOSE 8337

# Run command to start the development server
CMD ["php", "bin/console", "server:run", "0.0.0.0:8337"]