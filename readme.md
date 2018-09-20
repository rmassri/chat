# **Docker and docker-compose must be installed** #

## Descargar docker-compose
sudo curl -L https://github.com/docker/compose/releases/download/1.22.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose

## Establecer los servicios
sudo chmod +x /usr/local/bin/docker-compose

## Verificar la versión instalada
docker-compose --version

public chat in laravel

1.Clone this repository
   *   `git clone https://github.com/rmassri/laravel-chat.git`
   
2.access the project folder
   *    `cd ./laravel-chat`
   
3.access the project folder
   *   `cd ./laravel-chat/laradoc`
   
4.Execute the command.
   *   `docker-compose up -d nginx mysql`
  
5. install packages
   *   `docker-compose exec workspace composer install`
   *   `docker-compose exec workspace npm install`
   *   `docker-compose exec workspace php artisan key:generate`
   *   `docker-compose exec workspace php artisan migrate`
   
6. open the browser and run 
	localhost
>   **Nota:** In case of having a window we must download it in the following way
>   https://docs.docker.com/toolbox/overview/#whats-in-the-box


Nota. Ante el error de permisos. En vista que se creo la base de datos sin pemiso. Ejecutar los sigientes comando.
`cd ./laravel-chat/laradoc`
docker-compose up -d mysql
docker-compose start
docker-compose exec mysql mysql -uroot -proot
drop database chat;
create database chat;
exit;
docker-compose exec workspace php artisan migrate
	
	
