<?php include 'templates/header.php'; ?>

<div class="container mt-5 pt-5">
    <h1 class="text-center text-dark fw-bold pb-2 border-bottom border-3 border-dark">Gestión de Autores</h1>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#autorModal" onclick="openModalAutor();">
            + Agregar Autor
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nacionalidad</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- Se llenarán dinámicamente mediante JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para Autores -->
<div class="modal fade" id="autorModal" tabindex="-1" aria-labelledby="autorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 id="autorModalLabel" class="modal-title">Agregar Autor</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="autorForm">
                    <input type="hidden" id="autorId">
                    <div class="mb-3">
                        <label for="autorNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="autorNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="autorApellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="autorApellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="autorNacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" id="autorNacionalidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="autorFechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="autorFechaNacimiento" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/autor.js"></script>
<?php include 'templates/footer.php'; ?>