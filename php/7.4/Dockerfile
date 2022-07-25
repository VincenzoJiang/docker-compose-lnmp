FROM php:7.4-fpm
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/


RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get update -q \
    && DEBIAN_FRONTEND=noninteractive apt-get install -qq -y \
      curl \
      git  \
      zip unzip \
    && install-php-extensions \
      bcmath \
      bz2 \
      calendar \
      exif \
      gd \
      intl \
      ldap \
      memcached \
      mysqli \
      opcache \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      redis \
      soap \
      xsl \
      zip \
      sockets \
      swoole \
      yaf \
      memcached \
      mongodb \
      mcrypt \
      iconv \
      mbstring \
      amqp \
      rdkafka