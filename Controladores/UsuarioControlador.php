<?php
require_once __DIR__ . '/../Modelos/Repositorios/UsuarioRepositorio.php';

class UsuarioControlador
{
    public function index()
    {
        $repositorio = new UsuarioRepositorio();
        $users = $repositorio->obtenerTodos();

        include __DIR__ . '/../Vista/forms/Usuarios/Usuario.php';
    }
}