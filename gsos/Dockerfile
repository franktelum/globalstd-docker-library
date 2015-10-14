FROM zaibaiman/alpine-node
MAINTAINER Francisco Mendoza <software@globalstd.com>

# Informar a docker los puertos expuestos
EXPOSE 8080

# instalar nodemon
RUN npm install -g nodemon

# Directorio de trabajo
WORKDIR /gsos

# Clonar código fuente
RUN apk add --update git
RUN git clone https://github.com/franktelum/gsos.git .

WORKDIR /gsos/src

# Instalar dependencias
RUN npm install

CMD npm start
