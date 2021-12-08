Pasos para instalar la aplicación en local:

1- Tener PHP instalado
2- Tener Composer instalado
3- Tener Node.js instalado
4- Tener MySQL instalado
5- Entrar en la ruta del proyecto desde una terminal
6- Ejecutar npm update y npm i
7- Ejecutar composer update y composer install
8- Crear una tabla vacia en MySQL
9- Cambiar el nombre del archivo .env.example a .env y cambiar la configuracion de mysql de dentro a nuestra configuración local (puerto, usuario, contraseña y el nombre de la tabla que acabamos de crear)
10- Ejecutar php artisan migration
11- Ejecutar php artisan serve
