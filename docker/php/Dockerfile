FROM php:8.1-fpm-alpine3.16

RUN apk update && apk add \
		# libfreetype6-dev \
		# libjpeg62-turbo-dev \
    freetype-dev \
		libjpeg-turbo-dev \
    libpng-dev \
    autoconf \
    gcc \
    g++ \
    make\
    supervisor \ 
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
  pdo_mysql 

RUN pecl install redis \
    && docker-php-ext-enable redis 


ENV TZ=Asia/Tokyo \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer 

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY ./docker/app/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/laravel-worker.ini /etc/supervisor.d/laravel-worker.ini

WORKDIR /var/www/

CMD /usr/bin/supervisord -c /etc/supervisord.conf && docker-php-entrypoint php-fpm

EXPOSE 9000