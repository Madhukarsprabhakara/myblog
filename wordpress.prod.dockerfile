FROM wordpress:6.6-fpm-alpine

RUN mkdir -p /var/www/html
ADD ./wordpress /var/www/html
RUN chmod 755 /var/www/html/wp-content
