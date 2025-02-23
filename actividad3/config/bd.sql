CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL,
    fechaNacimiento DATE NOT NULL
);

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fechaPublicacion DATE NOT NULL,
    genero VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) UNIQUE NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    cantidad INT NOT NULL,
    autores_id INT NOT NULL,
    FOREIGN KEY (autores_id) REFERENCES autores(id) ON DELETE CASCADE
);

INSERT INTO autores (nombre, apellido, nacionalidad, fechaNacimiento)
VALUES
    ('Gabriel', 'García Márquez', 'Colombiana', '1927-03-06'),
    ('J.K.', 'Rowling', 'Británica', '1965-07-31'),
    ('Haruki', 'Murakami', 'Japonesa', '1949-01-12'),
    ('Isabel', 'Allende', 'Chilena', '1942-08-02'),
    ('Friedrich', 'Nietzsche', 'Alemana', '1844-10-15');


INSERT INTO libros (titulo, fechaPublicacion, genero, isbn, precio, cantidad, autores_id)
VALUES
    ('Cien Años de Soledad', '1967-06-05', 'Realismo Mágico', '9780307474728', 15.99, 100, 1),
    ('Harry Potter y la Piedra Filosofal', '1997-06-26', 'Fantasía', '9780747532699', 12.99, 150, 2),
    ('Kafka en la Orilla', '2002-09-12', 'Ficción Contemporánea', '9780307454750', 14.50, 120, 3),
    ('La Casa de los Espíritus', '1982-05-05', 'Realismo Mágico', '9780345806892', 16.99, 80, 4),
    ('Así Habló Zaratustra', '1883-12-25', 'Filosofía', '9780140441185', 9.99, 50, 5);

