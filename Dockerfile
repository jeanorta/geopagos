FROM jeanorta/apache-php:latest
MAINTAINER jeanorta

# Install packages
RUN apt-get update && \
 DEBIAN_FRONTEND=noninteractive apt-get -y upgrade && \
 DEBIAN_FRONTEND=noninteractive apt-get -y install supervisor pwgen && \
 apt-get -y install mysql-client unzip

RUN chown -R www-data:www-data /application

#to manange externally the container mysql in the real debian
EXPOSE 80
EXPOSE 3306
CMD ["/run.sh"]
