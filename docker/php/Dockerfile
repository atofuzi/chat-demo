# baseのイメージ
FROM php:8.1-fpm-alpine3.16 AS base-php-image
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

## composer 
FROM base-php-image AS composer

ENV TZ=Asia/Tokyo \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer 

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


## composer-installのステージ
FROM base-php-image AS composer-install-stage
WORKDIR /var/www/
COPY ./backend/ /var/www/

RUN composer install --no-dev

# 本番用ビルドステージ
FROM base-php-image AS prod
WORKDIR /var/www/

# COPY ./docker/app/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/laravel-worker.ini /etc/supervisor.d/laravel-worker.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY --from=composer-install-stage --chown=www-data:www-data /var/www/ /var/www/

CMD /usr/bin/supervisord -c /etc/supervisord.conf && docker-php-entrypoint php-fpm

EXPOSE 9000