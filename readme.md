##Instalar Docker

1. Update the apt package index:
	
	sudo apt-get update

2. Install packages to allow apt to use a repository over HTTPS:

	sudo apt-get install apt-transport-https ca-certificates curl software-properties-common

3. Add Docker’s official GPG key:

	curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

4. Set the repository

	sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

5. Install Docker CE
	
	sudo apt-get update
	sudo apt-get install docker-ce -y
 
6. permits to /usr/local/bin

sudo chown -R $(whoami) /usr/local/bin

7. import package

curl -L https://github.com/docker/compose/releases/download/1.1.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose

8. Install docker-compose

apt-get install docker-compose

9. Add sudoer user for docker
	
	sudo groupadd docker
	sudo gpasswd -a $USER docker
	sudo usermod -aG docker $USER
  
10. we close the session in the account so that the user has the permissions


11 The database server must be turned off or stopped and apache if used.

/etc/init.d/apache2 stop

/etc/init.d/mysql stop

12. Locate yourself in the project's root directory (laravel-chat/laradoc)

13. Execute the command.

docker-compose up

14. Execute the command

docker-compose exec workspace bash

15. We create the database called chat

create database chat;

16. Salimos de mysql.

exit;

15 Run the migrations

php artisan migrate

16 open the browser and run localhost


Nota: In case of having a window we must download it in the following way

https://docs.docker.com/toolbox/overview/#whats-in-the-box



