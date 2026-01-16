# Usa PHP con servidor web embebido
FROM php:8.2-cli

# Copia tu código
WORKDIR /app
COPY . /app

# Expone el puerto que Railway usará
EXPOSE 8080

# Comando para levantar el servidor PHP embebido
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
