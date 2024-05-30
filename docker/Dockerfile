FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt list --upgradable
RUN apt-get update

# Update packages after adding ppa
RUN apt-get install -y software-properties-common \
 && apt-add-repository ppa:ondrej/php
RUN apt-get update

#Installing the Nginx Web Server
RUN apt-get install nginx -y
RUN apt-get install apt-utils -y
RUN apt-get install cron -y
RUN apt-get install git -y
RUN apt-get install curl -y
RUN apt-get install nano -y
RUN apt-get install mysql-client -y
RUN apt-get install openssl -y
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt-get update && apt-get install -y \
    php7.4-cli \
    php7.4-json \
    php7.4-curl \
    php7.4-fpm \
    php7.4-gd \
    php7.4-ldap \
    php7.4-mbstring \
    php7.4-mysql \
    php7.4-soap \
    php7.4-sqlite3 \
    php7.4-xml \
    php7.4-zip \
    php7.4-intl \
    php7.4-amqp \
    php7.4-redis

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Nginx config
RUN rm /etc/nginx/sites-enabled/default
COPY nginx_conf/ibpproject.mil  /etc/nginx/sites-enabled/ibpproject.mil

ENTRYPOINT ["/usr/local/bin/application.sh"]
COPY application.sh /usr/local/bin/application.sh
RUN chmod +x /usr/local/bin/application.sh

COPY importdb.sh /usr/local/bin/importdb.sh
RUN chmod +x /usr/local/bin/importdb.sh

# Expose ports.
EXPOSE 443
WORKDIR /home/web/ibpproject