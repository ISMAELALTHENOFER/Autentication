# Sistema de Autenticación de Usuarios en PHP y MySQL

Este proyecto implementa un sistema básico y funcional para la gestión de usuarios mediante **PHP** y **MySQL**. 
Sus funcionalidades principales incluyen el registro de nuevos usuarios y la autenticación de cuentas existentes. 
El sistema se diseñó teniendo en cuenta buenas prácticas para la validación de datos y una experiencia de usuario sencilla.

## Características del Proyecto

### Registro de Usuarios:
#### Requisitos:
- Nombre completo.
- Email único: no debe estar registrado previamente.
#### Contraseña segura:
- Mínimo 4 caracteres.
- Al menos una letra mayúscula.
- Un carácter especial.

### Autenticación de Usuarios:
- Permite iniciar sesión con correo electrónico y contraseña.
- Después de la autenticación, se muestra un mensaje de bienvenida personalizado con el nombre asociado al correo electrónico.

### Interfaz de Usuario:
- Construida con Bootstrap 5.3+ (integración mediante CDN).
- Diseño responsivo y moderno.

## Requisitos del Sistema
- Servidor web: Compatible con PHP, como Apache o Nginx.
- PHP: Versión 7 o superior.
- Extensión MySQLi: Habilitada para conectar con la base de datos.
- Base de datos MySQL (o MariaDB) para almacenar y gestionar la información de usuarios.
  
## Configuración del Proyecto
### Base de datos:
En la carpeta sql/structure.sql se encuentra el script para crear la estructura inicial de la base de datos. 
Importar el archivo en tu gestor de base de datos para iniciar.
### Archivo de configuración:
- En la carpeta app/config, se incluye un archivo de ejemplo llamado **conexion_example.php.**
- Renombrar este archivo como **conexion.php.**
- Configurar las credenciales de conexión a la base de datos