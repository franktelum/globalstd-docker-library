FROM alpine:edge
MAINTAINER Francisco Mendoza <software@globalstd.com>

ENV DOWNLOAD_URL http://iweb.dl.sourceforge.net/project/suitecrm/suitecrm-7.3.1.zip
ENV DOWNLOAD_FILE suitecrm-7.3.1-max.zip
ENV EXTRACT_FOLDER SuiteCRM-7.3.1-MAX
ENV WWW_FOLDER /DATA/htdocs

RUN apk update \
    && apk add bash nginx ca-certificates \
    php-fpm php-json php-zip php-zlib php-xml php-pdo php-phar php-openssl \
    php-pdo_mysql php-mysqli php-ctype \
    php-gd php-iconv php-mcrypt \
    libpng-dev unzip curl gd zip imap && \
    rm -rf /var/lib/apt/lists/*

# fix php-fpm "Error relocating /usr/bin/php-fpm: __flt_rounds: symbol not found" bug
RUN apk add -u musl
RUN rm -rf /var/cache/apk/*

ADD files/nginx.conf /etc/nginx/
ADD files/php-fpm.conf /etc/php/
ADD files/run.sh /
RUN chmod +x /run.sh

# download suitecrm
RUN curl "${DOWNLOAD_URL}" > $DOWNLOAD_FILE && \
  unzip $DOWNLOAD_FILE && \
  rm $DOWNLOAD_FILE && \
  mkdir -p ${WWW_FOLDER} && \
  cp -v -R ${EXTRACT_FOLDER}/* ${WWW_FOLDER}

ADD files/php.ini /etc/php/php.ini
ADD files/config_override.php ${WWW_FOLDER}/config_override.php
ADD files/view.modulefield.php ${WWW_FOLDER}/modules/ModuleBuilder/views/view.modulefield.php

ADD crons.conf /root/crons.conf
RUN crontab /root/crons.conf

EXPOSE 80

CMD ["/run.sh"]
