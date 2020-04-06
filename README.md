# Delivery Api

A Proof-of-concept of a running Symfony 5 application inside containers

```
git clone git@github.com:kresnik87/delivery-food-api.git

cd delivery-food-api

cd docker

docker-compose up
```

## Compose

### Database (MariaDB)



### PHP (PHP-FPM)

Composer is included

```
docker-compose run php-fpm composer 
```

### Run php commands inside container

 1 - Go inside a docker dir in project /delivery-food-api/docker
 
 2 - Execute this command
```
docker-compose run php-fpm sh 
``` 
 3 - At this momment you can execute php command line inside a container 
 
 ### Resources
 Propuesta de Diagrama
 
 https://drive.google.com/open?id=1ZXXnO07ybKz6O6cH2uSnFZ05Iua5GupI 