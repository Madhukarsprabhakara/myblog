FROM nginx:stable-alpine

ADD ./nginx/default.prod.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html
ADD ./wordpress /var/www/html