FROM richarvey/nginx-php-fpm:latest
COPY . /var/www/html
ENV WEBROOT /var/www/html/public
ENV APP_KEY your_secret_key_here
RUN composer install --no-dev --optimize-autoloader
