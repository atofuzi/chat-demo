FROM php:8.1-fpm-alpine3.16

RUN apk update && apk add \
		# libfreetype6-dev \
		# libjpeg62-turbo-dev \
    freetype-dev \
		libjpeg-turbo-dev \
    libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
  pdo_mysql


ENV TZ=Asia/Tokyo \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer 

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/

EXPOSE 9000

# COPY ./docker/app/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
# COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

# RUN chown www-data storage/ -R 