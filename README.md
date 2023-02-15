## PROGRAMAS NECESARIOS PARA EL ENTORNO DE DESARROLLO
- **[XAMPP](https://www.apachefriends.org/es/download.html) (versión php 8^)**
- **[Composer](https://getcomposer.org/Composer-Setup.exe)**
- **[Visual Studio Code](https://code.visualstudio.com/)**
- **[Laravel 8](https://laravel.com/docs/8.x)**
- **MySQL**
- **phpMyAdmin (cliente)**
- **[Git](https://git-scm.com/downloads)**
- **[GitHub](https://github.com/)**
<!-- - **[WinRAR](https://www.winrar.es/descargas)** -->

### CLONAR EL PROYECTO
**Antes de descargar o clonar el proyecto lo ideal es que tengamos el entorno de desarrollo listo, para esto debemos tener instalados los programas necesarios anteriormente listados.**

## CONTRUCCIÓN Y EJECUCION
- Abrimos el proyecto con el editor de código favorito, en mi caso utilice **[Visual Studio Code](https://code.visualstudio.com/)**.
- Los comandos que se utilizan, se pueden ejecutar desde la consola que incluye visual studio code.

### VARIABLE DE ENTORNO DEL PROYECTO (.ENV) BDD
- Cuando hayamos abierto el proyecto buscaremos en la raiz del proyecto un archivo llamado **.env**
- Donde se encuentra toda la configuración de la aplicación.
- Configuración de base de datos utilizada para el proyecto`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbretoprogramacion
DB_USERNAME=root
DB_PASSWORD=
```
**dbretoprogramacion** es el nombre de la BDD que utilice, pueden modificar el nombre de preferencia.
- Si cambian el nombre y no surge cambios debe utilizar el comando:
```
php artisan config:cache
```
Este comando borrará la caché de configuración antes de que se cree uno nuevo y asi podra notar el cambio.

### MIGRATE
- Una vez que tengamos configurado la BDD, ahora vamos a generar las tablas con el sistema de migraciones de Laravel.
- Ejecutamos en la consola el comando;
```
php artisan migrate
```
Con este comando realizará la creación de las tablas del proyecto, las que necesitaremos para poder utilizar la aplicación

### SEEDERS (DATOS INICIALES DE PRUEBA)

**Es importante haber realizado las migraciones antes de realizar este paso**

los Seeders son archivos que nos van a permitir rellenar nuestra base de datos, asi ahorramos tiempo escribiendo manualmente todos los registros.
Para ejecutar un seeder utilizamos el comando:
```
php artisan db:seed
```

DATOS:
```
1.  USUARIO ADMINISTRADOR
    - USUARIO: ROOT 
    - CONTRASEÑA: 123456

2.  USUARIO COLABORADOR
    - USUARIO: COLABORADOR
    - CONTRASEÑA: 123456
```

### INICIAR EL SISTEMA
Para iniciar el sistema utilizar el comando:
```
php artisan serve
```
y podemos utilizar el navegador de preferencia e ingresar en la barra de busqueda:
```
http://localhost:8000
```
