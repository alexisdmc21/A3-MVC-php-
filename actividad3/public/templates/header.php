<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros y Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark d-flex flex-column min-vh-100">

<!--NAVBAR PARA LAS RESPECTIVAS OPCIONES COMO GESTION DE LIBRO Y GESTION AUTORES-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <div class="container">

            <!--ETIQUETA <a> REDIRECCIONANDO A LA PAGINA DE LA ESPE-->
            <a class="navbar-brand" href="https://www.espe.edu.ec/">
                <img src="https://encuestas.espe.edu.ec/tmp/assets/46dd5aad/ESPE.png" alt="ESPE Logo" width="36" height="40" class="me-2 align-middle">
                ESPE
            </a>

            <!--BOTON DE TIPO NAVBAR QUE MUESTRA Y OCULTA LAS OPCIONES DE GESTION DE AUTORES Y LIBROS EN PANTALLA PEQUEÑA-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--DIV QUE CONTIENE LAS OPCIONES-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="autores.php">Gestión de Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros.php">Gestión de Libros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>