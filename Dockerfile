FROM php:8.2-apache

# Enable Apache rewrite (optional but safe)
RUN a2enmod rewrite

# Copy all files into Apache root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
