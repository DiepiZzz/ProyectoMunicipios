<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../vendor/autoload.php';
require_once __DIR__ . '/../../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../../Controladores/MunicipiosControlador.php';

$controlador = new MunicipioControlador();

// 👉 Crear un nuevo municipio
$datosNuevo = [
    'nombre' => 'Villa Esperanza',
    'departamento' => 'San Pedro',
    'pais' => 'Honduras',
    'alcalde' => 'María González',
    'gobernador' => 'Carlos Duarte',
    'patron_religioso' => 'San Miguel',
    'num_habitantes' => 12000,
    'num_casas' => 3000,
    'num_parques' => 5,
    'num_colegios' => 8,
    'descripcion' => 'Municipio turístico con tradición religiosa.',
    'id_usuario' => 3 // Asegúrate que este usuario existe en tu tabla usuarios
];

$nuevoMunicipio = $controlador->crear($datosNuevo);

if ($nuevoMunicipio) {
    echo "✔ Municipio creado:\n";
    print_r($nuevoMunicipio->toArray());

    $id = $nuevoMunicipio->id_municipio;

    // 👉 Obtener todos los municipios
    echo "\n✔ Lista de municipios:\n";
    $municipios = $controlador->listar();
    foreach ($municipios as $municipio) {
        echo "- {$municipio->nombre} ({$municipio->departamento}, {$municipio->pais})\n";
    }

    // 👉 Ver uno por ID
    echo "\n✔ Ver municipio con ID $id:\n";
    $municipio = $controlador->ver($id);
    if ($municipio) {
        print_r($municipio->toArray());
    } else {
        echo "❌ No se encontró el municipio con ID $id.\n";
    }

    // 👉 Actualizar municipio
    echo "\n✔ Actualizando nombre del municipio:\n";
    $controlador->editar($id, ['nombre' => 'Villa Esperanza Renombrada']);
    $municipioActualizado = $controlador->ver($id);
    if ($municipioActualizado) {
        print_r($municipioActualizado->toArray());
    } else {
        echo "❌ No se encontró el municipio con ID $id luego de actualizar.\n";
    }

    // 👉 Eliminar municipio
    echo "\n✔ Eliminando municipio con ID $id...\n";
    $controlador->eliminar($id);
    echo "✔ Eliminado.\n";
} else {
    echo "❌ Error: No se pudo crear el municipio.\n";
}