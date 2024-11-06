FROM nginx:stable-alpine

ADD ./nginx/default.prod.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html
ADD ./wordpress /var/www/html
RUN chmod 755 /var/www/html/wp-content
ADD ./uploads /var/www/html/wp-content/uploads