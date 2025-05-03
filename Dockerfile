FROM php:8.3-apache

COPY . /var/www/html

# Install bun and deps
RUN apt-get update && apt-get install -y curl unzip
RUN curl -fsSL https://bun.sh/install | bash
RUN ~/.bun/bin/bun install

# Minify
RUN ~/.bun/bin/bun run minify:css

# Set perms
RUN chown -R www-data:www-data /var/www/html

RUN chmod -R 755 /var/www/html