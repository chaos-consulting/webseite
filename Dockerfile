FROM php:7-apache

RUN curl --silent -L https://github.com/e-picas/markdown-extended/archive/v0.1.0-delta.tar.gz | tar xz -C /usr/local/lib/php/
COPY . /var/www/html
