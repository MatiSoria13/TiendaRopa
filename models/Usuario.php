<?php
// Incluimos el archivo de configuración de la base de datos.
require 'config/Database.php';

class Usuario {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "usuarios";

    // Atributos privados.
    private $id;
    private $email;
    private $nombreUsuario;
    private $celular;
    private $contraseña;

    // Constructor para inicializar la conexión a la base de datos.
    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }

    // Getters y Setters para los atributos.
    public function getId() {
        return $this->id; // Retornamos el ID del usuario.
    }

    public function setId($id) {
        $this->id = $id; // Asignamos el ID del usuario.
    }

    public function getEmail() {
        return $this->email; // Retornamos el email del usuario.
    }

    public function setEmail($email) {
        $this->email = $email; // Asignamos el email del usuario.
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario; // Retornamos el nombre de usuario.
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario; // Asignamos el nombre de usuario.
    }

    public function getCelular() {
        return $this->celular; // Retornamos el número de celular del usuario.
    }

    public function setCelular($celular) {
        $this->celular = $celular; // Asignamos el número de celular del usuario.
    }

    public function getContraseña() {
        return $this->contraseña; // Retornamos la contraseña del usuario.
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña; // Asignamos la contraseña del usuario.
    }

    // Método para crear un nuevo usuario.
    public function create() {
        // Creamos una consulta SQL para insertar un nuevo registro en la tabla de usuarios.
        $query = "INSERT INTO " . $this->table_name . " SET email=?, nombreUsuario=?, celular=?, contraseña=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la contraseña para almacenarla de manera segura.
        $hashedPassword = password_hash($this->contraseña, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("ssss", $this->email, $this->nombreUsuario, $this->celular, $hashedPassword);
        
        // Ejecutamos la consulta y verificamos si se ejecutó correctamente.
        if ($stmt->execute()) {
            return true; // Retornamos true si el usuario fue creado exitosamente.
        } else {
            // Manejo de errores: mostramos el error y retornamos false.
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    
    // Método para leer todos los usuarios.
    public function readAll() {
        // Consulta SQL para seleccionar todos los registros de la tabla de usuarios.
        $query = "SELECT * FROM " . $this->table_name;
        
        // Ejecutamos la consulta y almacenamos el resultado.
        $result = $this->conn->query($query);
        return $result; // Retornamos el resultado de la consulta.
    }

    // Método para leer un usuario específico por su ID.
    public function readOne() {
        // Consulta SQL para seleccionar un registro específico por ID.
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id);
        
        // Ejecutamos la consulta.
        $stmt->execute();
        
        // Obtenemos el resultado y retornamos el registro como un arreglo asociativo.
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para actualizar un usuario existente.
    public function update() {
        // Consulta SQL para actualizar un registro en la tabla de usuarios.
        $query = "UPDATE " . $this->table_name . " SET email=?, nombreUsuario=?, celular=?, contraseña=? WHERE id=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la nueva contraseña.
        $hashedPassword = password_hash($this->contraseña, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("ssssi", $this->email, $this->nombreUsuario, $this->celular, $hashedPassword, $this->id);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }

    // Método para eliminar un usuario por su ID.
    public function delete() {
        // Consulta SQL para eliminar un registro específico por ID.
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }
}
?>
