
<?php

require_once __DIR__ . '/../../vendor/autoload.php'; 
require_once __DIR__ . '/../../Bootstrap.php';

use Modelos\Repositorios\UsuarioRepositorio;
use Modelos\Entidades\Usuario;

$usuarioRepo = new UsuarioRepositorio();

echo "✅ Crear usuario:\n";
$nuevo = $usuarioRepo->crear([
    'username' => 'testuser',
    'password' => password_hash('12345678', PASSWORD_DEFAULT),
    'nombre' => 'Test User',
    'email' => 'test@example.com',
]);

print_r($nuevo->toArray());

echo "\n✅ Todos:\n";
$todos = $usuarioRepo->obtenerTodos();
foreach ($todos as $user) {
    echo $user->id_usuario . " - " . $user->nombre . "\n";
}

echo "\n✅ Buscar por ID:\n";
$found = $usuarioRepo->buscarPorId($nuevo->id_usuario);
print_r($found->toArray());

echo "\n✅ Actualizar:\n";
$updated = $usuarioRepo->actualizar($nuevo->id_usuario, ['nombre' => 'Actualizado']);
print_r($updated->toArray());

//echo "\n✅ Eliminar:\n";
//$deleted = $usuarioRepo->eliminar($nuevo->id_usuario);
//echo $deleted ? "Eliminado" : "No eliminado";