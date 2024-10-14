FROM php:8.0-fpm
RUN docker-php-ext-install pdo pdo_mysql

FROM nginx:alpine

# Adiciona um usuário www-data se não existir
RUN addgroup -S www-data && adduser -S www-data -G www-data

COPY ./src /var/www/html

