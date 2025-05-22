FROM php:7.4-apache

# Установка библиотек PostgreSQL и MySQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    default-mysql-client \
    default-libmysqlclient-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql

# Включаем mod_rewrite (если нужно)
RUN a2enmod rewrite

# Копируем приложение в корень веб-сервера
COPY ./www /var/www/html/

# (Опционально) даём права www-data
RUN chown -R www-data:www-data /var/www/html/

# Открываем 80 порт (по умолчанию в php:apache)
EXPOSE 80
