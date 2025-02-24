//Esta es la ruta base de la API, puede ser modificado segun el entorno de cada persona
const apiUrl='http://localhost/php-mvc-gl-ga/A3-MVC-php-/actividad3/public';

// Al cargar la página, se ejecuta la función para obtener todos los autores.
document.addEventListener('DOMContentLoaded', () => getAutores());

//Funcion que obtiene todos los autores desde la API y actualiza la tabla.
const getAutores = ()=> {
    axios.get(`${apiUrl}/autores`)
    .then(response => {
      const autores = response.data; //Variable que guardar los datos enviados por el servidor
      const tbody = document.querySelector('#autoresTable tbody'); //Variable que guarda la referencia del tbody para luego ser manipulado para la obtencion de datos
      tbody.innerHTML = '';
      //forEach que recorre el array de autores y crea dinamicamente las filas tr
      autores.forEach(autor => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${autor.id}</td>
          <td>${autor.nombre}</td>
          <td>${autor.apellido}</td>
          <td>${autor.nacionalidad}</td>
          <td>${autor.fechaNacimiento}</td>
          <td>
            <button class="btn btn-sm btn-info" onclick="editAutor(${autor.id})">Editar</button>
            <button class="btn btn-sm btn-danger" onclick="deleteAutor(${autor.id})">Eliminar</button>
          </td>
        `;
        tbody.appendChild(tr); //Se encarga de agregar un elemnto de fila a la tabla de autores
      });
    })
    .catch(error => console.error(error));
};

//Abre el modal para agregar un nuevo autor.
const openModalAutor = () => {
    document.getElementById('autorForm').reset();
    document.getElementById('autorId').value = '';
    document.getElementById('autorModalLabel').innerText = 'Agregar Autor';
};

//Envía el formulario para crear o actualizar un autor, gracia el evento del boton guardar.
document.getElementById('autorForm').addEventListener('submit', e => {
    e.preventDefault();

    //Se obtiene el valor de cada campo del formulario y se almacena en variables
    const id = document.getElementById('autorId').value;
    const nombre = document.getElementById('autorNombre').value;
    const apellido = document.getElementById('autorApellido').value;
    const nacionalidad = document.getElementById('autorNacionalidad').value;
    const fechaNacimiento = document.getElementById('autorFechaNacimiento').value;

    //Condicional if que verifica si el 'id' existe, es decir el autor ya está en la base de datos por ende sera una actulizacion
    if (id) {

      //Hace la solicitud PUT
        axios.put(`${apiUrl}/autores`, { id, nombre, apellido, nacionalidad, fechaNacimiento })
          .then(response => {
    
            alert("Autor actualizado correctamente"); //Mensaje de que la ejecucion fue correcta
            $('#autorModal').modal('hide');
            getAutores();
          })
          .catch(error => console.error(error));
      } else {

        //Si no existe el id entonces creara el autor con la solicitud POST
        axios.post(`${apiUrl}/autores`, { nombre, apellido, nacionalidad, fechaNacimiento })
          .then(response => {
    
            alert("Autor agregado correctamente"); //Mensaje de que la ejecucion fue correcta
            $('#autorModal').modal('hide');
            getAutores();
          })
          .catch(error => console.error(error));
      }
    });

    //Carga los datos de un autor en el formulario para editar.
    const editAutor = id => {

      //Hace solicitud GET para obtener los datos del autor
        axios.get(`${apiUrl}/autores/${id}`)
          .then(response => {
            const autor = response.data;
            document.getElementById('autorId').value = autor.id;
            document.getElementById('autorNombre').value = autor.nombre;
            document.getElementById('autorApellido').value = autor.apellido;
            document.getElementById('autorNacionalidad').value = autor.nacionalidad;
            document.getElementById('autorFechaNacimiento').value = autor.fechaNacimiento;
            document.getElementById('autorModalLabel').innerText = 'Editar Autor';
            $('#autorModal').modal('show');
          })
          .catch(error => console.error(error));
      };

      //Elimina un autor.
      // 
      //Función para eliminar un autor que recibe el 'id' del autor como parámetro
      const deleteAutor = id => {
        if (confirm('¿Estás seguro de eliminar este autor?')) {
          axios.delete(`${apiUrl}/autores`, { data: { id } })
          .then(response => {
            alert("Autor eliminado correctamente");
            getAutores(); 
        })
            .catch(error => console.error(error));
        }
      };