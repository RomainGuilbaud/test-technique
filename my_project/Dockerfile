FROM php:8.0-apache

RUN a2enmod rewrite

RUN apt-get update \
  && apt-get install -y libzip-dev git wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:1.10.17 /usr/bin/composer /usr/bin/
COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
COPY . /var/www
WORKDIR /var/www

CMD ["apache2-foreground"]

ENTRYPOINT ["docker/entrypoint.sh"]