FROM php:7.3-fpm

RUN mkdir -p /home && mkdir -p /home/www
WORKDIR /home/www

## 更换国内源
#COPY sources.list /etc/apt/sources.list

#COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

#RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get update -q \
#    && DEBIAN_FRONTEND=noninteractive apt-get install -qq -y \
#      curl \
#      git  \
#      zip unzip \
#      wget \
#      vim \
#      lsof && install-php-extensions \
#      bcmath \
#      bz2 \
#      calendar \
#      exif \
#      gd \
#      intl \
#      ldap \
#      memcached \
#      mysqli \
#      opcache \
#      pdo_mysql \
#      pdo_pgsql \
#      pgsql \
#      redis \
#      soap \
#      xsl \
#      zip \
#      sockets \
#      yaf \
#      mongodb \
#      mcrypt \
#      amqp \
#      rdkafka \
#      pcntl \
#      Protobuf \
#      swoole-4.4.26

##swoole
# RUN wget -O /tmp/swoole-4.6.6.tgz https://pecl.php.net/get/swoole-4.6.6.tgz && tar -xzvf /tmp/swoole-4.6.6.tgz -C /tmp && mkdir -p  && mv /usr/src/php/ext/ && /tmp/swoole-4.6.6 /usr/src/php/ext/swoole && docker-php-ext-install swoole enable-openssl="yes"

# 配置国内镜像源（加速下载）
RUN sed -i 's/deb.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list && \
    sed -i 's/security.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list

# 安装系统依赖
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip unzip \
    wget \
    vim \
    lsof \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libxml2-dev \
    libxslt1-dev \
    libbz2-dev \
    libmemcached-dev \
    libpq-dev \
    libyaml-dev

RUN apt-get install -y \
    libssl-dev

# 安装核心 PHP 扩展
RUN docker-php-ext-install \
    bcmath \
    bz2 \
    calendar \
    exif \
    intl \
    mysqli \
    opcache \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    soap \
    sockets \
    xsl \
    zip \
    pcntl

# 配置并安装 GD
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

# 安装 PECL 扩展
RUN pecl install redis-5.3.7 && docker-php-ext-enable redis
RUN pecl install memcached && docker-php-ext-enable memcached
#RUN pecl install mongodb && docker-php-ext-enable mongodb
#RUN pecl install swoole && docker-php-ext-enable swoole

# 安装 AMQP（需要先安装 RabbitMQ C 库）
RUN apt-get install -y librabbitmq-dev
#RUN pecl install amqp && docker-php-ext-enable amqp

#swoole
RUN wget -O /tmp/swoole.tar.gz https://pecl.php.net/get/swoole-4.6.6.tgz \
    && tar -xzf /tmp/swoole.tar.gz -C /tmp \
    && cd /tmp/swoole-4.6.6 \
    && phpize \
    && ./configure --enable-openssl --enable-sockets \
    && make -j$(nproc) \
    && make install \
    && docker-php-ext-enable swoole \
    && rm -rf /tmp/swoole.tar.gz /tmp/swoole-4.6.6






#RUN pecl install mongodb-1.9.2 && docker-php-ext-enable mongodb


# 清理
 RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*