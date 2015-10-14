FROM zaibaiman/alpine-java:7

ENV USR_LOCAL_PATH /usr/local
ENV CATALINA_HOME $USR_LOCAL_PATH/tomcat
ENV PATH $CATALINA_HOME/bin:$PATH
RUN mkdir -p "$USR_LOCAL_PATH"
WORKDIR $USR_LOCAL_PATH

ENV TOMCAT_MAJOR 8
ENV TOMCAT_VERSION 8.0.27
ENV TOMCAT_TGZ_URL https://www.apache.org/dist/tomcat/tomcat-$TOMCAT_MAJOR/v$TOMCAT_VERSION/bin/apache-tomcat-$TOMCAT_VERSION.tar.gz

RUN apk --update add curl ca-certificates

RUN curl \
      --silent \
      --location \
      --retry 3 \
      --cacert /etc/ssl/certs/ca-certificates.crt \
      "https://archive.apache.org/dist/tomcat/tomcat-$TOMCAT_MAJOR/v$TOMCAT_VERSION/bin/apache-tomcat-$TOMCAT_VERSION.tar.gz" \
      | gunzip \
      | tar x -C $USR_LOCAL_PATH \
      && mv $USR_LOCAL_PATH/apache-tomcat* $USR_LOCAL_PATH/tomcat \
      && rm -rf $CATALINA_HOME/webapps/examples $CATALINA_HOME/webapps/docs

EXPOSE 8080
CMD ["catalina.sh", "run"]
