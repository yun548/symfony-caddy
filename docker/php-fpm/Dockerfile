FROM php:7.4-fpm-alpine

LABEL maintainer="Jordi Fernandez <jfernandezcarrere@gmail.com>"

RUN apk add --update \
    bzip2-dev \
    libmcrypt-dev \
    libxml2-dev \
    libpng-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    make \
    git \
    zip \
    php7-xmlreader \
    php7-xmlwriter \
    php7-simplexml \
    curl-dev

RUN docker-php-ext-install bz2 ctype curl dom gd iconv json fileinfo \
  intl mbstring xml pdo_mysql mysqli phar tokenizer session zip bcmath sockets

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

# Install Composer v1.10.13 w/ checksum check
RUN mkdir -p /opt/composer
WORKDIR /opt/composer

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# You can disable that check if you don't care for the latest version.
# You can update the checksum with the value provided here : https://getcomposer.org/download/
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN ln -s /opt/composer/composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

ADD symfony.ini /etc/php7/php-fpm.d/
ADD cli.ini /etc/php7/cli/conf.d/
ADD php.ini /usr/local/etc/php/

ADD symfony.pool.conf /etc/php7/php-fpm.d/

WORKDIR /var/www/symfony

CMD ["php-fpm"]