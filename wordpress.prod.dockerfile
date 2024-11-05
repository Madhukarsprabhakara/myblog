FROM wordpress:6.6-fpm-alpine

RUN mkdir -p /var/www/html

RUN chmod -R 777 /var/www/html/wp-content
