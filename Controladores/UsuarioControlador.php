<?php
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';

class usuarioControlador{

    public function index(){


        $usuario = new Usuario();
        $users = $usuario->getUsuarios();

        include __DIR__ . '/../Vista/forms/Usuarios/Usuario.php';
    }
}
