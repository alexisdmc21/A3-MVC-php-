const apiUrl='http://localhost/proyecto_a3/A3-MVC-php-/actividad3/public';

// Al cargar la página, se ejecuta la función para obtener todos los libros.
document.addEventListener('DOMContentLoaded', () => getLibros());

/**
 * Obtiene todos los libros desde la API y actualiza la tabla.
 */
const getLibros = () => {
  axios.get(`${apiUrl}/libros`)
    .then(response => {
      const libros = response.data;
      const tbody = document.querySelector('#librosTable tbody');
      tbody.innerHTML = '';
      libros.forEach(libro => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${libro.id}</td>
          <td>${libro.titulo}</td>
          <td>${libro.autor_nombre}</td>
          <td>${libro.fechaPublicacion}</td>
          <td>${libro.genero}</td>
          <td>${libro.isbn}</td>
          <td>${libro.precio}</td>
          <td>${libro.cantidad}</td>
          <td>
            <button class="btn btn-sm btn-info" onclick="editLibro(${libro.id})">Editar</button>
            <button class="btn btn-sm btn-danger" onclick="deleteLibro(${libro.id})">Eliminar</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error(error));
};

/**
 * Abre el modal para agregar un nuevo libro.
 */
const openModalLibro = () => {
  document.getElementById('libroForm').reset();
  document.getElementById('libroId').value = '';
  document.getElementById('libroModalLabel').innerText = 'Agregar Libro';
};

/**
 * Envía el formulario para crear o actualizar un libro.
 */
document.getElementById('libroForm').addEventListener('submit', e => {
  e.preventDefault();
  const id = document.getElementById('libroId').value;
  const titulo = document.getElementById('libroTitulo').value;
  const autores_id = document.getElementById('libroAutor').value;
  const fechaPublicacion = document.getElementById('libroFechaPublicacion').value;
  const genero = document.getElementById('libroGenero').value;
  const isbn = document.getElementById('libroIsbn').value;
  const precio = document.getElementById('libroPrecio').value;
  const cantidad = document.getElementById('libroCantidad').value;

  if (id) {
    axios.put(`${apiUrl}/libros`, { id, titulo, autores_id, fechaPublicacion, genero, isbn, precio, cantidad })
      .then(response => {

        alert('Libro actualizado correctamente');
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  } else {
    axios.post(`${apiUrl}/libros`, { titulo, autores_id, fechaPublicacion, genero, isbn, precio, cantidad })
      .then(response => {
        alert('Libro agregado correctamente');
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  }
});

/**
 * Carga los datos de un libro en el formulario para editar.
 */
const editLibro = id => {
  axios.get(`${apiUrl}/libros/${id}`)
    .then(response => {
      const libro = response.data;
      document.getElementById('libroId').value = libro.id;
      document.getElementById('libroTitulo').value = libro.titulo;
      document.getElementById('libroAutor').value = libro.autores_id;
      document.getElementById('libroFechaPublicacion').value = libro.fechaPublicacion;
      document.getElementById('libroGenero').value = libro.genero;
      document.getElementById('libroIsbn').value = libro.isbn;
      document.getElementById('libroPrecio').value = libro.precio;
      document.getElementById('libroCantidad').value = libro.cantidad;
      document.getElementById('libroModalLabel').innerText = 'Editar Libro';
      $('#libroModal').modal('show');
    })
    .catch(error => console.error(error));
};

/**
 * Elimina un libro.
 */
const deleteLibro = id => {
  if (confirm('¿Estás seguro de eliminar este libro?')) {
    axios.delete(`${apiUrl}/libros`, { data: { id } })
      .then(response => getLibros())
      .catch(error => console.error(error));
  }
};

/**
 * Obtiene todos los autores y llena el select en el formulario de libros.
 */
const llenarSelectAutores = () => {
  axios.get(`${apiUrl}/autores`)
    .then(response => {
      const autores = response.data;
      const selectAutor = document.getElementById("libroAutor");

      // Limpiar el select antes de agregar nuevas opciones
      selectAutor.innerHTML = "";

      // Agregar una opción por defecto
      let optionDefault = document.createElement("option");
      optionDefault.value = "";
      optionDefault.textContent = "Seleccione un autor";
      optionDefault.disabled = true;
      optionDefault.selected = true;
      selectAutor.appendChild(optionDefault);

      // Recorrer los autores y agregarlos al select
      autores.forEach(autor => {
        let option = document.createElement("option");
        option.value = autor.id;
        option.textContent = `${autor.nombre} ${autor.apellido}`;
        selectAutor.appendChild(option);
      });
    })
    .catch(error => console.error("Error al obtener los autores:", error));
};

// Llamar a la función cuando la página se cargue
document.addEventListener("DOMContentLoaded", () => {
  llenarSelectAutores();
  getLibros();
});