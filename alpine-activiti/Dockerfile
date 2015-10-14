FROM zaibaiman/alpine-java:7
MAINTAINER Francisco Mendoza "software@globalstd.com"

EXPOSE 8080

ENV TOMCAT_MAJOR 8
ENV TOMCAT_VERSION 8.0.14
ENV ACTIVITI_VERSION 5.16
ENV MYSQL_CONNECTOR_JAVA_VERSION 5.1.33

RUN apk add --update bash openssl unzip

RUN mkdir opt

# Add tomcat
RUN wget http://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR}/v${TOMCAT_VERSION}/bin/apache-tomcat-${TOMCAT_VERSION}.tar.gz -O /opt/catalina.tar.gz \
      && tar xzf /opt/catalina.tar.gz -C /opt \
      && ln -s /opt/apache-tomcat-${TOMCAT_VERSION} /opt/tomcat \
      && rm /opt/catalina.tar.gz \
      && rm -rf /opt/tomcat/webapps/examples \
      && rm -rf /opt/tomcat/webapps/docs

# Add activiti
RUN wget https://github.com/Activiti/Activiti/releases/download/activiti-${ACTIVITI_VERSION}/activiti-${ACTIVITI_VERSION}.zip -O /opt/activiti.zip \
      && unzip /opt/activiti.zip -d /opt/activiti \
      && rm /opt/activiti.zip \
      && unzip /opt/activiti/activiti-${ACTIVITI_VERSION}/wars/activiti-explorer.war -d /opt/tomcat/webapps/activiti-explorer \
      && unzip /opt/activiti/activiti-${ACTIVITI_VERSION}/wars/activiti-rest.war -d /opt/tomcat/webapps/activiti-rest \
      && rm -rf /opt/activiti/activiti-${ACTIVITI_VERSION}

# Add mysql connector to application
RUN wget http://dev.mysql.com/get/Downloads/Connector-J/mysql-connector-java-${MYSQL_CONNECTOR_JAVA_VERSION}.zip -O /tmp/mysql-connector-java.zip \
      && unzip /tmp/mysql-connector-java.zip -d /tmp \
      && cp /tmp/mysql-connector-java-${MYSQL_CONNECTOR_JAVA_VERSION}/mysql-connector-java-${MYSQL_CONNECTOR_JAVA_VERSION}-bin.jar /opt/tomcat/webapps/activiti-rest/WEB-INF/lib/ \
      && cp /tmp/mysql-connector-java-${MYSQL_CONNECTOR_JAVA_VERSION}/mysql-connector-java-${MYSQL_CONNECTOR_JAVA_VERSION}-bin.jar /opt/tomcat/webapps/activiti-explorer/WEB-INF/lib/

# Add roles and enable CORS
ADD assets /assets
RUN cp /assets/config/tomcat/tomcat-users.xml /opt/apache-tomcat-${TOMCAT_VERSION}/conf/
RUN cp /assets/config/tomcat/web.xml /opt/apache-tomcat-${TOMCAT_VERSION}/conf/

CMD ["/assets/init"]
