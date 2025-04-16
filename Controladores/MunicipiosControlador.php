<?php

require_once __DIR__ . '/../Modelos/Servicios/MunicipiosService.php';

use Modelos\Servicios\MunicipiosService;

class MunicipiosControlador {

    private $municipioService;

    public function __construct() {
        $this->municipioService = new MunicipiosService();
    }

    // Mostrar todos los municipios
    public function index() {
        $municipios = $this->municipioService->listarMunicipios();
        require __DIR__ . '/../Vista/forms/Municipios/MunicipiosFormulario.php';
    }

    // Mostrar formulario de creación
    public function crear() {
        require __DIR__ . '/../Vista/forms/Municipios/MunicipiosRegistro.php';
    }

    // Guardar nuevo municipio
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $this->filtrarDatos($_POST);
            $this->municipioService->registrarMunicipio($datos);

            header('Location: index.php?controlador=municipios&accion=index');
            exit;
        }
    }

    // Mostrar formulario de edición
    public function editar() {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $municipio = $this->municipioService->obtenerMunicipio($id);
            if ($municipio) {
                require __DIR__ . '/../Vista/forms/Municipios/editar.php';
            } else {
                echo "Municipio no encontrado.";
            }
        } else {
            echo "ID no válido.";
        }
    }

    // Actualizar municipio
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id && is_numeric($id)) {
                $datos = $this->filtrarDatos($_POST);
                $this->municipioService->editarMunicipio($id, $datos);

                header('Location: index.php?controlador=municipios&accion=index');
                exit;
            } else {
                echo "ID no válido.";
            }
        }
    }

    // Eliminar municipio
    public function eliminar() {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $this->municipioService->eliminarMunicipio($id);
            header('Location: index.php?controlador=municipios&accion=index');
            exit;
        } else {
            echo "ID no válido para eliminar.";
        }
    }

    // Función privada para sanear los datos
    private function filtrarDatos(array $datos): array {
        return [
            'nombre'            => htmlspecialchars($datos['nombre'] ?? ''),
            'departamento'      => htmlspecialchars($datos['departamento'] ?? ''),
            'país'              => htmlspecialchars($datos['país'] ?? ''),
            'alcalde'           => htmlspecialchars($datos['alcalde'] ?? ''),
            'gobernador'        => htmlspecialchars($datos['gobernador'] ?? ''),
            'patronoReligioso'  => htmlspecialchars($datos['patronoReligioso'] ?? ''),
            'numHabitantes'     => (int) ($datos['numHabitantes'] ?? 0),
            'numCasas'          => (int) ($datos['numCasas'] ?? 0),
            'numParques'        => (int) ($datos['numParques'] ?? 0),
            'numColegios'       => (int) ($datos['numColegios'] ?? 0),
            'descripcion'       => htmlspecialchars($datos['descripcion'] ?? ''),
            'id_usuario'        => (int) ($datos['id_usuario'] ?? 0),
        ];
    }
}