FROM php:7.4-fpm

RUN mkdir -p /home && mkdir -p /home/www
WORKDIR /home/www

## 更换国内源
COPY sources.list /etc/apt/sources.list

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get update -q \
    && DEBIAN_FRONTEND=noninteractive apt-get install -qq -y \
      curl \
      git  \
      zip unzip \
      wget \
      lsof && install-php-extensions \
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
      yaf \
      mongodb \
      mcrypt \
      amqp \
      rdkafka \
      pcntl \
      Protobuf \
      swoole-4.4.26 \
      geoip

##swoole
# RUN wget -O /tmp/swoole-4.6.6.tgz https://pecl.php.net/get/swoole-4.6.6.tgz && tar -xzvf /tmp/swoole-4.6.6.tgz -C /tmp && mkdir -p  && mv /usr/src/php/ext/ && /tmp/swoole-4.6.6 /usr/src/php/ext/swoole && docker-php-ext-install swoole enable-openssl="yes"
