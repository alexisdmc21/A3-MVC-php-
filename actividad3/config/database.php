<?php

class Database
{
    private $host    = "localhost";
    private $db_name  = "bd-proyecto"; // Definimos el nombre de la base de datos
    private $username = "root";
    private $password = "";
    public $conn; // Variable para almacenar la conexión a la base de datos

    //Método para obtener la conexión a la base de datos
    public function getConnection()
    {
        // Crear una nueva conexión PDO a la base de datos
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {

            // Muestra un mensaje de error con la descripción del problema
            echo "Error de conexion:" . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
