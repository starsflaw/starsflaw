FROM php:8.0.2-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli

COPY index.php /var/www
COPY login.php /var/www
COPY register.php /var/www
COPY home.php /var/www
COPY flag.php /var/www
COPY .htaccess /var/www
COPY db_connect.php /var/www
COPY logout.php /var/www
COPY style.css /var/www

FROM mysql:5.7

ENV MYSQL_ALLOW_EMPTY_PASSWORD=true
ENV MYSQL_USER=mysql
ENV MYSQL_PASSWORD=password
ENV MYSQL_DATABASE=db

COPY commandsql.sql /docker-entrypoint-initdb.d/


