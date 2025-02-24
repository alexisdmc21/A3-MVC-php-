//Esta es la ruta base de la API, puede ser modificado segun el entorno de cada persona
const apiUrl = 'http://localhost/php-mvc-gl-ga/A3-MVC-php-/actividad3/public';

// Al cargar la página, se ejecuta la función para obtener todos los libros.
document.addEventListener('DOMContentLoaded', () => getLibros());

//Funcion que obtiene todos los libros desde la API y actualiza la tabla.
const getLibros = () => {
  axios.get(`${apiUrl}/libros`)
    .then(response => {
      const libros = response.data; //Variable que guardar los datos enviados por el servidor
      const tbody = document.querySelector('#librosTable tbody'); //Variable que guarda la referencia del tbody para luego ser manipulado para la obtencion de datos
      tbody.innerHTML = '';
      //forEach que recorre el array de libros y crea dinamicamente las filas tr
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
            <button class="btn btn-success btn-sm text-white fw-bold" onclick="editLibro(${libro.id})">
              <i class="fas fa-edit"></i> Editar
            </button>
            <button class="btn btn-danger btn-sm fw-bold" onclick="deleteLibro(${libro.id})">
              <i class="fas fa-trash-alt"></i> Eliminar
            </button>
          </td>
        `;
        tbody.appendChild(tr); //Se encarga de agregar un elemnto de fila a la tabla de libros
      });
    })
    .catch(error => console.error(error));
};


//Abre el modal para agregar un nuevo libro.
const openModalLibro = () => {
  document.getElementById('libroForm').reset();
  document.getElementById('libroId').value = '';
  document.getElementById('libroModalLabel').innerText = 'Agregar Libro';
};


//Envía el formulario para crear o actualizar un libro, gracia el evento del boton guardar.
document.getElementById('libroForm').addEventListener('submit', e => {
  e.preventDefault();

  //Se obtiene el valor de cada campo del formulario y se almacena en variables
  const id = document.getElementById('libroId').value;
  const titulo = document.getElementById('libroTitulo').value;
  const autores_id = document.getElementById('libroAutor').value;
  const fechaPublicacion = document.getElementById('libroFechaPublicacion').value;
  const genero = document.getElementById('libroGenero').value;
  const isbn = document.getElementById('libroIsbn').value;
  const precio = document.getElementById('libroPrecio').value;
  const cantidad = document.getElementById('libroCantidad').value;

  // Validación: precio y cantidad deben ser mayores a 0
  if (precio <= 0) {
    alert("El precio debe ser mayor a 0.");
    return;
  }

  if (cantidad <= 0) {
    alert("La cantidad debe ser mayor a 0.");
    return;
  }

  //Condicional if que verifica si el 'id' existe, es decir el libro ya está en la base de datos por ende sera una actualizacion
  if (id) {

    //Hace la solicitud PUT
    axios.put(`${apiUrl}/libros`, { id, titulo, autores_id, fechaPublicacion, genero, isbn, precio, cantidad })
      .then(response => {

        alert('Libro actualizado correctamente'); //Mensaje de que la ejecucion fue correcta
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  } else {

    //Si no existe el id entonces creara el libro con la solicitud POST
    axios.post(`${apiUrl}/libros`, { titulo, autores_id, fechaPublicacion, genero, isbn, precio, cantidad })
      .then(response => {
        alert('Libro agregado correctamente'); //Mensaje de que la ejecucion fue correcta
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  }
});


//Carga los datos de un libro en el formulario para editar.

const editLibro = id => {

  //Hace solicitud GET para obtener los datos del libro
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

//Elimina un libro.

// Función para eliminar un libro que recibe el 'id' del libro como parámetro
const deleteLibro = id => {

  //Se lanza una tipo alerta si quiere eliminar el libro 
  if (confirm('¿Estás seguro de eliminar este libro?')) {

    //Si confirma lo eliminara con la solicitud DELETE
    axios.delete(`${apiUrl}/libros`, { data: { id } })
      .then(response => {
        alert('Libro eliminado correctamente'); // Alerta después de eliminar el libro
        getLibros(); // Actualiza la lista de libros luego de la accion
      })
      .catch(error => console.error(error));
  }
};

//Obtiene todos los autores y llena el select que contiene los autores creados en el formulario de libros.
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
      optionDefault.textContent = "Seleccione un autor"; //Opcion defecto
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
    .catch(error => console.error(error));
};

// Llamar a la función cuando la página se cargue
document.addEventListener("DOMContentLoaded", () => {
  llenarSelectAutores();
  getLibros();
});