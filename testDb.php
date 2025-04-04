<?php
require_once __DIR__ . '/Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/Modelos/Entidades/Usuario.php';

$usuarios = Usuario::all();

foreach ($usuarios as $usuario) {
    echo $usuario->nombre . " - " . $usuario->email . "<br>";
}