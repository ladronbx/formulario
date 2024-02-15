# Prueba Técnica - Bienve Ladrón

## Descripción

El proyecto consiste en desarrollar un formulario de registro de usuarios en una página web, donde los usuarios proporcionan información como nombre, apellidos, correo electrónico, teléfono, código postal, y aceptan las políticas de privacidad. El formulario debe ser procesado en el lado del servidor utilizando PHP siguiendo el patrón MVC y los principios SOLID. Se deben realizar diversas validaciones de los datos ingresados antes de insertar la información del usuario en la base de datos.

## Instalación y Uso

1. Ejecuta `composer install` para instalar todas las dependencias de PHP especificadas en el archivo composer.json.
2. Renombra el archivo **.env.example** a **.env** y configura las variables de entorno necesarias, como la conexión a la base de datos.
3. Ejecuta php `artisan migrate` para migrar las tablas de la base de datos según las definiciones en los archivos de migración.
4. Ejecuta `php artisan serve` para iniciar el servidor de desarrollo de Laravel. Por defecto, se ejecutará en http://localhost:8000.
5. Abre el archivo **index.html** en tu navegador web. Puedes acceder al formulario de registro de usuarios a través de este archivo y poder enviar los datos del formulario.

Nota: Si prefieres realizar las solicitudes directamente desde el backend utilizando un archivo JSON de ejemplo, puedes importar el endpoint necesario. Encuentra el archivo JSON de ejemplo en la carpeta app/Http/Endpoint para ejecutar la ruta 'register' con datos de muestra.



## Importar endpoint 
📁 Si deseas realizar las solicitudes directamente desde el backend utilizando un archivo JSON de ejemplo, he proporcionado un archivo de muestra en la carpeta **app/Http/Endpoint**. Este archivo JSON puede ser útil para ejecutar la ruta 'register' con datos de muestra. 


## Tecnologías Utilizadas

- HTML
- Tailwind CSS
- PHP
- Laravel

## Portfolio

Puedes ver más de mis proyectos en [mi web](https://www.ladron-bienve.com/).

## Contacto

📧 Para cualquier pregunta o comentario, no dudes en ponerte en contacto:

- **Bienve Ladrón**

<a href="mailto:ladronbravovlc@gmail.com"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" alt="Email" target="_blank"></a>

<a href="https://github.com/ladronbx" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" alt="GitHub" target="_blank"></a>

