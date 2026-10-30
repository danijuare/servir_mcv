# servir_mcv

Aplicación web para administrar departamentos y empleados.

## Tecnologías utilizadas

- **PHP** para la lógica del servidor y la estructura MVC.
- **MySQL** para almacenar los departamentos y empleados.
- **MySQLi** para la conexión con la base de datos.
- **JavaScript y jQuery** para las interacciones de las vistas.
- **Bootstrap, DataTables y SweetAlert2** para la interfaz y sus componentes.

## Requisitos

- [XAMPP] con Apache, MySQL y PHP.
- Un navegador web.
- Conexión a Internet para cargar las bibliotecas.

## Instalación y ejecución local

1. Copiar o clonar el proyecto dentro de la carpeta `htdocs` de XAMPP.

2. Abrir el panel de XAMPP e inicia **Apache** y **MySQL**.

3. Crear la base de datos `servir_examen`.

4. Revisar los datos de conexión en `config/global.php`. Según las credenciales asigadas donde se creo la base datos.

5. Abre la aplicación en el navegador: http://localhost/servir_examen/vistas/

## Estructura principal

- `Modelos/`: acceso y operaciones sobre los datos hacia la base de datos.
- `vistas/`: paginas del usuario.
- `ajax/`: endpoints para solicitudes de las vistas.
- `config/`: configuracion y conexion.
- `bd/servir_examen.sql`: creacion de la base de datos y sus tablas.
