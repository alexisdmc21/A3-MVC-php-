const apiUrl='http://localhost/proyecto_a3/A3-MVC-php-/actividad3/public';


document.addEventListener('DOMContentLoaded', () => getAutores());

const getAutores = ()=> {
    axios.get(`${apiUrl}/autores`)
    .then(response => {
      const autores = response.data;
      const tbody = document.querySelector('#autoresTable tbody');
      tbody.innerHTML = '';
      autores.forEach(autor => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${autor.id}</td>
          <td>${autor.nombre}</td>
          <td>${autor.apellido}</td>
          <td>${autor.nacionalidad}</td>
          <td>${autor.fechaNacimiento}</td>
          <td>
            <button onclick="editAutor(${autor.id})">Editar</button>
            <button onclick="deleteAutor(${autor.id})">Eliminar</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error(error));
};

const openModalAutor = () => {
    document.getElementById('autorForm').reset();
    document.getElementById('autorId').value = '';
    document.getElementById('autorModalLabel').innerText = 'Agregar Autor';
};

document.getElementById('autorForm').addEventListener('submit', e => {
    e.preventDefault();
    const id = document.getElementById('autorId').value;
    const nombre = document.getElementById('autorNombre').value;
    const apellido = document.getElementById('autorApellido').value;
    const nacionalidad = document.getElementById('autorNacionalidad').value;
    const fechaNacimiento = document.getElementById('autorFechaNacimiento').value;

    if (id) {
        axios.put(`${apiUrl}/autores`, { id, nombre, apellido, nacionalidad, fechaNacimiento })
          .then(response => {
    
            alert("Autor actualizado correctamente");
            $('#autorModal').modal('hide');
            getAutores();
          })
          .catch(error => console.error(error));
      } else {
        axios.post(`${apiUrl}/autores`, { nombre, apellido, nacionalidad, fechaNacimiento })
          .then(response => {
    
            alert("Autor agregado correctamente");
            $('#autorModal').modal('hide');
            getAutores();
          })
          .catch(error => console.error(error));
      }
    });

    const editAutor = id => {
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

      const deleteAutor = id => {
        if (confirm('¿Estás seguro de eliminar este autor?')) {
          axios.delete(`${apiUrl}/autores`, { data: { id } })
            .then(response => getAutores())
            
            
            .catch(error => console.error(error));
        }
      };