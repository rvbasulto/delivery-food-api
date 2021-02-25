# Delivery Api

A Proof-of-concept of a running Symfony 5 application inside containers

```
git clone git@github.com:rvbasulto/delivery-food-api.git

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

### Init db for local development

1 - Execute `docker container exec -it -w / database bash`
2 - Inside the database container execute `mysql -u appuser -papppassword`
3 - Insert the client data and the adminuserwith the commands 
```
INSERT INTO `client` VALUES (1,'3ctcd291lby8oos0ks4c04ckcksgsw8wwcgsss08o4o8c0ok80','a:1:{i:0;s:9:\"api/login\";}','2di423poj3ggwco84s04cscoko4gwsw84000o84c8gcccg8s08','a:2:{i:0;s:8:\"password\";i:1;s:18:\"client_credentials\";}');
```
and
````
INSERT INTO `user` VALUES (1,NULL,NULL,'adminuser','adminuser','yaidelferrales@gmail.com','adminuser@gmail.com',1,'86AC4fR8QGqRJLTXxglxddtMPJoEYBZtx1j5UbZ/pvo','$2y$13$nEEL5tR93R5Mdzz6DObudu7Jz5O0fd34zFYVps28NQDIV8ycj1V1m','2021-02-24 23:44:38',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',NULL,NULL,NULL,NULL,NULL);
```

### Create admin user to manage backend EasyAdmin (PRODUCTION)
1 - First create client_id and client_secret
  ```
 php bin/console fos:oauth-server:create-client --redirect-uri="api/login" --grant-type="password" --grant-type="client_credentials" 
  ``` 
2 - Copy generated values in .env
  
3 -  Inside a container run next command
 ```
php bin/console fos:user:create adminuser --super-admin 
 ``` 