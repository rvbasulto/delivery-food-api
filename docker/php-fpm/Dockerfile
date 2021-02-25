
FROM php:7.4-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it

RUN apt-get update
RUN apt-get install -y unzip vim

RUN docker-php-ext-enable opcache
RUN docker-php-ext-install calendar
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install tokenizer
RUN docker-php-ext-install json

RUN curl -o /usr/local/bin/composer https://getcomposer.org/composer-1.phar
RUN chmod 755 /usr/local/bin/composer

RUN apt install -y netcat
WORKDIR /var/www
CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm

EXPOSE 9000
