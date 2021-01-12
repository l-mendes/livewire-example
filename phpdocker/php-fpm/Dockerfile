FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

RUN mkdir -p /var/www
RUN chown www-data:www-data /var/www -R

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.4-memcached php7.4-mysql php7.4-xdebug php7.4-bcmath php7.4-bz2 php7.4-dba php7.4-enchant php7.4-gd php7.4-odbc php7.4-soap \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*