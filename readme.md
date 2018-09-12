# **Docker and docker-compose must be installed** #

public chat in laravel

1.Clone this repository
   *   `git clone https://github.com/rmassri/laravel-chat.git`
   
2.access the project folder
   *    `cd ./laravel-chat`
   
3.Execute the command.
   *   `docker-compose up -d nginx mysql`
   
4.access the project folder
   *   `cd ./laradoc
   `
5. install packages
   *   `docker-compose exec workspace composer install`
   *   `docker-compose exec workspace npm install`
   *   `docker-compose exec workspace php artisan key:generate`
   *   `docker-compose exec workspace php artisan migrate`
   
6. open the browser and run 
	localhost
>   **Nota:** In case of having a window we must download it in the following way
>   https://docs.docker.com/toolbox/overview/#whats-in-the-box

	
	
