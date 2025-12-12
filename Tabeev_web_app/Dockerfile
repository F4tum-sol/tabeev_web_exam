FROM php:latest

RUN docker-php-ext-install mysqli

RUN apt-get update
COPY . /var/www/html/
WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html
CMD ["php", "-S", "0.0.0.0:80"]