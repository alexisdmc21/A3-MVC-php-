<?php include 'templates/header.php'; ?> <!--SE INCLUYE EL HEADER QUE CONTIENE LOS NAVBAR-->

<!--DISEÑOS DE LA PAGINA-->
<div class="position-fixed top-0 start-0 w-100 h-100" 
     style="background: url('https://d37adozyy71gtb.cloudfront.net/wp-content/uploads/2024/06/00-Portada.jpg') no-repeat center center fixed; 
            background-size: cover; opacity: 0.5; z-index: -1;">
</div>

<!--DIV QUE CONTIENE EL TITULO DEL PROYECTO Y UN RESUMEN DE LA APLICACION-->
<div class="d-flex flex-column min-vh-100">
    <main class="container flex-grow-1 d-flex align-items-center justify-content-center text-center">
        <div class="p-5 rounded shadow-lg bg-light text-dark">
            <h1 class="display-4">Gestión de Libros y Autores</h1>
            <br>
            <h2>Bienvenido a nuestra aplicación de Gestión de Libros y Autores</h2>
            <p>Esta es una aplicación basada en los principios de una arquitectura MVC que
                separa responsabilidades de la aplicación, permitiéndonos tener una forma
                sencilla y eficiente de organizar una colección de libros y la información
                de autores.
                Nuestra aplicación permite explorar, agregar, modificar y eliminar libros y autores
                de manera intuitiva y sencilla. Con una interfaz moderna y funcionalidades 
                dinámicas, podemos asimilar a un gestor de una biblioteca real.
            </p>
            <br>

            <!--INTEGRANTES DEL GRUPO-->
            <h2>Integrantes</h2>
            <ul class="list-unstyled">
                <li>Alexis Damian Morales Cuasquer</li>
                <li>Jessica Estefania Sanchez Ugsiña</li>
                <li>Melanie Abigail Talavera Castillo</li>
            </ul>
        </div>
    </main>

    <?php include 'templates/footer.php'; ?> <!--SE INCLUYE EL FOOTER QUE CONTIENE EL DISEÑO Y LOS SCRIPTS NECESARIOS PARA ACCIONES DE MODALES, BOOTSTRAP, JQUERY-->
</div>
</body>
</html>