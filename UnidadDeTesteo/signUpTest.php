<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';
require_once __DIR__ . '/../Modelos/Servicios/signUpServices.php';

use Modelos\Entidades\Usuario;
use Modelos\Servicios\signUpServices;


$usuario = new Usuario();
$usuario->username = 'olas123'; 
$usuario->password = '12345678';
$usuario->nombre   = 'ola';
$usuario->email    = 'ola' . rand(1, 1000) . '@example.com'; 


$signupService = new signUpServices();
$resultado = $signupService->validateAndRegisterUser($usuario);


print_r($resultado);