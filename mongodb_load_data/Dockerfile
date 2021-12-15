FROM mongo:latest

ADD 25.csv /var/www/html/

# install Python 3
RUN apt-get update && apt-get install -y python3 python3-pip
RUN pip3 install pymongo
RUN pip3 install pandas

EXPOSE 27017
