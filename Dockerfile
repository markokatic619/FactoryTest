FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    nginx

RUN docker-php-ext-install pdo_mysql

COPY nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html

EXPOSE 80