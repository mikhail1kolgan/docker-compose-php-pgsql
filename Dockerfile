FROM php:7.4-apache

# Установка библиотек PostgreSQL и MySQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    default-mysql-client \
    default-libmysqlclient-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql

# Включаем mod_rewrite (если нужно)
RUN a2enmod rewrite
