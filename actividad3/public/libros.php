<?php include 'templates/header.php'; ?>

<div class="container mt-5 pt-5">
    <h1 class="text-center text-dark fw-bold pb-2 border-bottom border-3 border-dark">Gestión de Libros</h1>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#libroModal" onclick="openModalLibro();">
            + Agregar Libro
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año de publicación</th>
                    <th>Género</th>
                    <th>ISBN</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- Se llenarán dinámicamente mediante JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para Libros -->
<div class="modal fade" id="libroModal" tabindex="-1" aria-labelledby="libroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 id="libroModalLabel" class="modal-title">Agregar Libro</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="libroForm">
                    <input type="hidden" id="libroId">
                    <div class="mb-3">
                        <label for="libroTitulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="libroTitulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="libroAutor" class="form-label">Autor</label>
                        <select class="form-select" id="libroAutor" required>
                            <!-- Se llenará dinámicamente mediante JavaScript -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="libroFechaPublicacion" class="form-label">Fecha de publicación</label>
                        <input type="date" class="form-control" id="libroFechaPublicacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="libroGenero" class="form-label">Género</label>
                        <input type="text" class="form-control" id="libroGenero" required>
                    </div>
                    <div class="mb-3">
                        <label for="libroIsbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="libroIsbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="libroPrecio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="libroPrecio" required>
                    </div>
                    <div class="mb-3">
                        <label for="libroCantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="libroCantidad" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/libro.js"></script>
<?php include 'templates/footer.php'; ?>