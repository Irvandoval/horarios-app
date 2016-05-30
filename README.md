HorariosApp
=========

Bienvenidos a HorariosApp - Una aplicación desarrollada en Symfony2 que me 
permite gestionar todas las tareas para planificar los horarios de las asignaturas
impartidas en un ciclo de estudio.

En este documento se encuentra los pasos para poder instalar correctamente 
HorariosApp en un entorno local ya sea en un entorno de Desarrollo o de 
Producción.

1) Instalación de HorariosApp
---------------------------

Antes de comenzar con el proceso de instalación es necesario mencionar los 
requerimientos del sistema, basta con tener instalado un entorno LAMP (Linux 
Apache MySQL PHP) para proceder a la instalación.

### Descargar la Aplicación

El Código fuente de HorariosApp se encuentra en los repositorios públicos de 
GitHub es por ello que para descargar solo bastará con hacer un clon de este
repositorio en su servidor local.

    git clone  https://github.com/Irvandoval/horarios-app.git  horariosApp

Dentro del directorio generado ejecutamos:

    php composer.phar install

2) Configuración de la Base de Datos
-------------------------------------

generar el esquema de base de datos de la siguiente forma:

    php app/console doctrine:schema:create

3) Permiso en los Directorios
-----------------------------

Antes de corroborar y comenzar a utilizar HorariosApp es necesario asignarle 
algunos permisos especiales a dos directorios:

    chown www-data:www-data app/cache/ -R
    chown www-data:www-data app/logs/ -R
    chmod 777 app/cache/ -R
    chmod 777 app/logs/ -R

4) Configuraciones Finales
--------------------------

Finalmente solo nos queda ejecutar los siguientes comandos de Symfony2 para 
terminar de cargar los datos inicial y crear algunos enlaces simbólicos que 
necesita el sistema.

    php app/console assets:install web/
    php app/console doctrine:fixtures:load --append

Ahora solo queda entrar desde un navegador web a http://<ip servidor>/HorariosApp/web/app.php


5) Usuarios por defecto
-----------------------

### Credenciales para el usuario Administrador

 * admin@admin.com / admin

### Credenciales para el usuario con menos privilegios

 * usuario@usuario.com / usuario
 
6) Configuracion postgresql 
-----------------------

Crear la base de datos en postgresq, colocar las credenciales en el parameter,
da un error en el logueo por el tipo de dato booleano hay que ir a la entidad 
UsuarioType y cambiar una condicion que verifica si el usuario esta activo en 
ves de usar unos o cero para comparar valores booleanos usar True o False eso 
solo para postgresql

