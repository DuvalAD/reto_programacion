## PROGRAMAS NECESARIOS PARA EL ENTORNO DE DESARROLLO
- **[XAMPP](https://www.apachefriends.org/es/download.html) (versión php 8^)**
- **[Composer](https://getcomposer.org/Composer-Setup.exe)**
- **[Visual Studio Code](https://code.visualstudio.com/)**
- **[Laravel 8](https://laravel.com/docs/8.x)**
- **MySQL**
- **phpMyAdmin (cliente)**
- **[Git](https://git-scm.com/downloads)**
- **[GitHub](https://github.com/)**

### CLONAR EL PROYECTO
**Antes de descargar o clonar el proyecto lo ideal es que tengamos el entorno de desarrollo listo, para esto debemos tener instalados los programas necesarios anteriormente listados.**

- Para clonar el proyecto debemos utilizar **[Git](https://git-scm.com/downloads)**.
- Abrimos la ubicación de preferencia done vayamos a clonar el repositorio (puede ser incluso en el escritorio).
- Copiamos el link que github genera `https://github.com/DuvalAD/reto_programacion.git`.
- y el el terminal escribimos los siguiente:

```
git clone https://github.com/DuvalAD/reto_programacion.git
```
Listo!! :+1: repositorio clonado.


## CONTRUCCIÓN Y EJECUCION
- Abrimos el proyecto con el editor de código favorito, en mi caso utilice **[Visual Studio Code](https://code.visualstudio.com/)**.
- Los comandos que se utilizan, se pueden ejecutar desde la consola que incluye visual studio code.

### INSTALAR LAS DEPENDENCIAS DE LARAVEL USANDO COMPOSER
- Abrimos la consola yo utilizo la consola integrada de **[Visual Studio Code](https://code.visualstudio.com/)**.
- Ingresamos el siguiente comando (Para esto ya deberiamos tener instalado **[Composer](https://getcomposer.org/Composer-Setup.exe) en nuestra maquina).

```
composer update
composer install
``` 
Este comando leerá el archivo `composer.json` y comenzara a intalar todas las dependencias.

### GENERAR ARCHIVO .ENV 
- Para generar el archiv **.env** debemos ingresar el siguiente comando en la consola:
```
cp .env.example .env
```
lo que hace el comando es hacer una copia del archivo `.env.example`. y lo nombra `.env` es donde estara la configuración para nuestro proyecto.

### GENERAR UNA CLAVE DEL PROYECTO
- Ingresamos el siguiente comando:
```
php artisan key:generate
``` 

### CONFIGURACIÓN DE CREDENCIALES PARA LA BASE DE DATOS EN  ARCHIVO .ENV DEL PROYECTO
- Cuando hayamos realizado los pasos anteriores en nuestro proyecto buscaremos el archivo **.env**
- Donde se encuentra toda la configuración de la aplicación (variables De Entorno).
- Configuración de base de datos utilizada para el proyecto:
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

DATOS DE ACCESO AL SISTEMA:
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
