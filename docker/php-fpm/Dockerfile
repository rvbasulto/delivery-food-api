
FROM php:7.4-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it

RUN apt-get update
RUN apt-get install -y unzip vim

RUN curl -o /usr/local/bin/composer https://getcomposer.org/composer-1.phar
RUN chmod 755 /usr/local/bin/composer

WORKDIR /var/www
CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm 

EXPOSE 9000
