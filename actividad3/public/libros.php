<?php include 'templates/header.php'; ?>

<h1>Gestion de Libros</h1>
<div>
  <button data-toggle="modal" data-target="#libroModal" onclick="openModalLibro();">+ Agregar Libro</button>
</div>
<table id="librosTable">
  <thead>
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
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para Libros -->
<div class="modal fade" id="libroModal" tabindex="-1" role="dialog" aria-labelledby="libroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="libroModalLabel" class="modal-title">Agregar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="libroForm">
          <input type="hidden" id="libroId">
          <div class="form-group">
            <label for="libroTitulo">Título</label>
            <input type="text" class="form-control" id="libroTitulo" required>
          </div>
          <div class="form-group">
                <label for="libroAutor">Autor</label>
                <select class="form-control" id="libroAutor" required>
                    <!-- Se llenará dinámicamente mediante JavaScript -->
                </select>
            </div>
          <div class="form-group">
            <label for="libroFechaPublicacion">Fecha de publicación</label>
            <input type="date" class="form-control" id="libroFechaPublicacion" required>
          </div>
          <div class="form-group">
            <label for="libroGenero">Género</label>
            <input type="text" class="form-control" id="libroGenero" required>
          </div>
          <div class="form-group">
            <label for="libroIsbn">ISBN</label>
            <input type="text" class="form-control" id="libroIsbn" required>
          </div>
          <div class="form-group">
            <label for="libroPrecio">Precio</label>
            <input type="number" class="form-control" id="libroPrecio" required>
          </div>
          <div class="form-group">
            <label for="libroCantidad">Cantidad</label>
            <input type="number" class="form-control" id="libroCantidad" required>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/libro.js"></script>


<?php include 'templates/footer.php'; ?>