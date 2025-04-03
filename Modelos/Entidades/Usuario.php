<?php
require_once __DIR__ . '/../../Utilidades/conexionBaseDeDatos.php';
class Usuario
{
    private $id;
    private $username;
    private $password;
    private $nombre;
    private $email;
    private $db;
   

    public function __construct()
    {
        $database = new ConexionBaseDeDatos();
        $this->db = $database->conexion();
       
    }


    public function getUsuarios()
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result ?: [];
    }
}
?>