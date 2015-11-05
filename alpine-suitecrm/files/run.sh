#!/bin/sh

[ -f /run-pre.sh ] && /run-pre.sh

if [ ! -d /DATA/htdocs ] ; then
  mkdir -p /DATA/htdocs
  chown nginx:www-data /DATA/htdocs
fi

chown -R nginx /DATA/htdocs

# start php-fpm
mkdir -p /DATA/logs/php-fpm
php-fpm

# start nginx
mkdir -p /DATA/logs/nginx
mkdir -p /tmp/nginx
chown nginx /tmp/nginx
nginx
