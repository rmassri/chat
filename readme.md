En primer lugar se debe apagar o detener el servidor de base de datos y apache en caso de usarlo.

En linux apache /etc/init.d/apache2 stop

mysql /etc/init.d/mysql stop

Paso numero 1

Ubicarse en el directorio rais del proyecto(laravel-chat/laradoc)

paso numero 2

Ejecutar el comando

docker-compose up

Paso numero 3

Ejecutar el comando

docker-compose exec workspace bash

Paso numero 3

Correr las migraciones

php artisan migrate

Paso numero 4

abrir el nvegador y ejecutar localhost
