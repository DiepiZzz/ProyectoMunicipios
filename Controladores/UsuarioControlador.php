<?php
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';

class usuarioControlador
{
    public function index()
    {
        $users = Usuario::all()->toArray();
        include __DIR__ . '/../Vista/forms/Usuarios/Usuario.php';
    }
}
