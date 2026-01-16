# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copiamos los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Exponemos el puerto que Apache usa
EXPOSE 80











