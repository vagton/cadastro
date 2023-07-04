FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    gnupg \
    unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN docker-php-ext-install pdo pdo_mysql

# Defina o diretório de trabalho
WORKDIR /var/www/html

COPY . /var/www/html

RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html