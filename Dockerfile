FROM php:7.2-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/

COPY apache_actf.conf /etc/apache2/sites-available/
RUN  a2ensite apache_actf.conf 
