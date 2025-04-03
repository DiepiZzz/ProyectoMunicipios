<?php

class ConexionBaseDeDatos {
    private $host = "localhost";
    private $dbname = "php_municipios";
    private $user = "postgres";
    private $password = "root";
    public $conn;
    


    public function conexion() {
        try {
            $this->conn = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
