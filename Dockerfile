FROM php:8.2-apache

# Copiar el código al contenedor
COPY . /var/www/html/

# Permitir URL-encoded GET
RUN a2enmod rewrite
















