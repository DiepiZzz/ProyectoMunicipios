
<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Librerias/orm/ConexionBaseDeDatos.php'; // conecta Eloquent
require_once __DIR__ . '/../../Modelos/Repositorios/UsuarioRepositorio.php';

// Instanciar repositorio
$usuarioRepo = new UsuarioRepositorio();


// 1. Crear un nuevo usuario
echo "✅ Crear usuario:\n";
$nuevoUsuario = $usuarioRepo->crear([
    'username' => 'juan23',
    'password' => password_hash('secreto123', PASSWORD_DEFAULT),
    'nombre'   => 'Juan Pérez',
    'email'    => 'juanperez@example.com',
]);
print_r($nuevoUsuario->toArray());


// 2. Obtener todos los usuarios
echo "\n✅ Obtener todos:\n";
$todos = $usuarioRepo->obtenerTodos();
foreach ($todos as $user) {
    echo $user->id . " - " . $user->nombre . "\n";
}


// 3. Buscar usuario por ID
echo "\n✅ Buscar por ID:\n";
$usuario = $usuarioRepo->buscarPorId($nuevoUsuario->id);
print_r($usuario ? $usuario->toArray() : "No encontrado");


// 4. Actualizar usuario
echo "\n✅ Actualizar:\n";
$actualizado = $usuarioRepo->actualizar($nuevoUsuario->id, [
    'nombre' => 'Juan Actualizado'
]);

if ($actualizado) {
    print_r($actualizado->toArray());
} else {
    echo "❌ No se pudo actualizar al usuario con ID: " . $nuevoUsuario->id;
}


// 5. Eliminar usuario
echo "\n✅ Eliminar:\n";
$eliminado = $usuarioRepo->eliminar($nuevoUsuario->id);
echo $eliminado ? "Eliminado correctamente" : "No se pudo eliminar";