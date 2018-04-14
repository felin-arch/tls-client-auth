FROM php:7.0.12-apache

WORKDIR /var/www

RUN chmod 755 /etc/ssl/private
COPY etc/ssl/private/generate-certs.sh /etc/ssl/private/generate-certs.sh
COPY etc/ssl/private/ca.conf /etc/ssl/private/ca.conf
COPY etc/ssl/private/server.conf /etc/ssl/private/server.conf
COPY etc/ssl/private/joe.conf /etc/ssl/private/joe.conf
COPY etc/ssl/private/jane.conf /etc/ssl/private/jane.conf
RUN cd /etc/ssl/private && chmod +x generate-certs.sh && ./generate-certs.sh

RUN rm -f /etc/apache2/sites-available/default-ssl.conf
COPY etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/

RUN a2enmod ssl
