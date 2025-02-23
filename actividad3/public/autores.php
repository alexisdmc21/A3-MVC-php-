<?php
include 'templates/header.php';
?>

<h1>Gestion de Autores</h1>
<div>
  <button data-toggle="modal" data-target="#autorModal" onclick="openModalAutor();">+ Agregar Autor</button>
</div>
<table id="autoresTable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Nacionalidad</th>
      <th>Fecha de Nacimiento</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para Autores -->
<div class="modal fade" id="autorModal" tabindex="-1" role="dialog" aria-labelledby="autorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="autorModalLabel" class="modal-title">Agregar Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="autorForm">
          <input type="hidden" id="autorId">
          <div class="form-group">
            <label for="autorNombre">Nombre</label>
            <input type="text" class="form-control" id="autorNombre" required>
          </div>
          <div class="form-group">
            <label for="autorApellido">Apellido</label>
            <input type="text" class="form-control" id="autorApellido" required>
          </div>
          <div class="form-group">
            <label for="autorNacionalidad">Nacionalidad</label>
            <input type="text" class="form-control" id="autorNacionalidad" required>
          </div>
          <div class="form-group">
            <label for="autorFechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="autorFechaNacimiento" required>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/autor.js"></script>
<?php include 'templates/footer.php'; ?>