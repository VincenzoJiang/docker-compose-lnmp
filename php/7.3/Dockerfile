FROM crpi-d0x3buemxmymp6j4.cn-guangzhou.personal.cr.aliyuncs.com/vincenzo_jiang/php:php73
RUN mkdir -p /home && mkdir -p /home/www
RUN WORKDIR /home/www


#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mv composer.phar /usr/local/bin/composer

# #RUN pecl install mongodb-1.9.2 && docker-php-ext-enable mongodb
