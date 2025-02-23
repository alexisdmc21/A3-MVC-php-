# Actividad de aprendizaje N.°3 - 2do Parcial
# Desarrollo de una Aplicación Web en PHP con el Modelo MVC para la Gestión de Libros y Autores 

# Integrantes:

- Alexis Damian Morales Cuasquer
- Jessica Estefania Sanchez Ugsiña
- Melanie Abigail Talavera Castillo

# Descripción de la actividad

Desarrollar una aplicación web funcional que gestione libros y autores utilizando el modelo MVC en PHP, implementando la gestión de peticiones con Axios, Bootstrap para el diseño de la interfaz, modales para la gestión de formularios y un menú de navegación dinámico. Además, se configurarán rutas mediante un router y se utilizará .htaccess para gestionar la estructura de URLs amigables.

# Proyecto

Este proyecto implica el desarrollo de una aplicación web para la administración de libros y autores. Mediante esta aplicación, los usuarios tienen la posibilidad de efectuar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) en relación a libros y autores guardados en una base de datos.
El sistema ofrece una interfaz fácil de usar que facilita la visualización de la lista de libros disponibles, la adición de nuevos libros, la modificación de datos ya existentes y la eliminación de registros. Adicionalmente, se preserva la integridad de la información mediante claves foráneas y limitaciones para prevenir inconsistencias.
El proyecto adopta la estructura Modelo-Vista-Controlador (MVC) con el objetivo de preservar una arquitectura ordenada.

# Tecnologías Utilizadas

- Backend: PHP utilizando el modelo MVC para estructurar la lógica del proyecto.
- Base de Datos: MySQL para almacenar datos acerca de libros y autores.
- Frontend: HTML, CSS y JavaScript destinados a la interfaz de usuario.
- Estructura de JavaScript: Axios para ejecutar solicitudes HTTP asíncronas.
- Servidor Web: Para llevar a cabo la aplicación en el ambiente local.
- .htaccess: Para establecer la reescritura de URLs y facilitar el enrutamiento.

# Desarrollo (Instrucciones para ejecutar la aplicación)

Para llevar a cabo la aplicación, se requiere establecer un servidor local como XAMPP, WAMP o LAMP, importar la base de datos desde bd.sql y asegurarse de que la configuración de conexión en config/database.php sea correcta. Una vez configurado, se puede acceder a la aplicacion, la cual cuenta con una página de inicio (inicio.php), donde se presenta una introducción al sistema de gestión de libros y autores. En la parte superior de la interfaz, se encuentra un menú de navegación ubicado en el encabezado (header.php). Este menú permite a los usuarios acceder a diferentes secciones de la aplicación, ya sea la gestión de libros o autores. 
El sistema permite al usuario gestionar los libros a través de la interfaz gráfica. Los datos se cargan y manipulan mediante peticiones GET, POST, PUT y DELETE, esto facilita una interacción efectiva con la base de datos. 
