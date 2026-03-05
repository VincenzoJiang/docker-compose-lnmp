FROM php:8.3-fpm


RUN mkdir -p /home && mkdir -p /home/www
WORKDIR /home/www

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# 配置并安装 GD 扩展（支持多种图片格式）
# RUN docker-php-ext-configure gd \
#         --with-freetype \
#         --with-jpeg \
#         --with-webp \
#         --with-xpm \
#     && docker-php-ext-install -j$(nproc) gd

# 安装 PDO 相关扩展
# RUN docker-php-ext-install \
#         pdo_mysql \
#         pdo_pgsql \
#         mysqli \
#         pdo \
#         intl \
#         zip \
#         opcache

# 安装 PECL 扩展（Redis 和 imagick）
# RUN pecl install redis \
#     && pecl install imagick \
#     && docker-php-ext-enable redis imagick

# RUN pecl install redis \
#     && docker-php-ext-enable redis
RUN install-php-extensions redis \ pdo_mysql \
        pdo_pgsql \
        mysqli \ 
        imagick \
        gd


# RUN pecl install imagick \
#     && docker-php-ext-enable imagick

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN mv composer.phar /usr/local/bin/composer