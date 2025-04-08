<?php
require_once __DIR__ . '/../Bootstrap.php';

use Illuminate\Validation\Factory as ValidatorFactory;

$datos = [
    'nombre' => 'Diego',
    'email' => 'Diepiposa007@gmail.com',
    'password' => '123456789',
];

$reglas = [
    'nombre' => 'required|min:3',
    'email' => 'required|email',
    'password' => 'required|min:8',
];

$mensajes = [
    'nombre.required'   => 'El nombre es obligatorio.',
    'nombre.min'        => 'El nombre debe tener al menos :min caracteres.',

    'email.required'    => 'El correo electrónico es obligatorio.',
    'email.email'       => 'El correo electrónico no es válido.',

    'password.required' => 'La contraseña es obligatoria.',
    'password.min'      => 'La contraseña debe tener al menos :min caracteres.',
];

// Usa el factory cargado desde bootstrap.php
$validator = $validatorFactory->make($datos, $reglas, $mensajes);

if ($validator->fails()) {
    print_r($validator->errors()->all());
} else {
    echo "✔ Todo validado correctamente";
}