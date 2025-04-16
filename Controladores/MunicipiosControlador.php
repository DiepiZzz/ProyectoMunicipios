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
        session_start();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['usuario']['id_usuario'])) {
                echo "Error: No se ha iniciado sesión o falta el id del usuario.";
                echo '<pre>'; print_r($_SESSION); echo '</pre>';
                exit;
            }
    
          
    
            $datos = [
                'nombre' => $_POST['nombre'] ?? '',
                'departamento' => $_POST['departamento'] ?? '',
                'pais' => $_POST['pais'] ?? '',
                'alcalde' => $_POST['alcalde'] ?? '',
                'gobernador' => $_POST['gobernador'] ?? '',
                'patron_religioso' => $_POST['patron_religioso'] ?? '',
                'num_habitantes' => $_POST['num_habitantes'] ?? 0,
                'num_casas' => $_POST['num_casas'] ?? 0,
                'num_parques' => $_POST['numParques'] ?? 0,
                'num_colegios' => $_POST['numColegios'] ?? 0,
                'descripcion' => $_POST['descripcion'] ?? '',
                'id_usuario' => $_SESSION['usuario']['id_usuario']
            ];
    
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
            'pais'              => htmlspecialchars($datos['pais'] ?? ''),
            'alcalde'           => htmlspecialchars($datos['alcalde'] ?? ''),
            'gobernador'        => htmlspecialchars($datos['gobernador'] ?? ''),
            'patron_religioso'  => htmlspecialchars($datos['patron_religioso'] ?? ''),
            'num_habitantes'     => (int) ($datos['num_habitantes'] ?? 0),
            'num_casas'          => (int) ($datos['num_casas'] ?? 0),
            'num_parques'        => (int) ($datos['num_parques'] ?? 0),
            'num_colegios'       => (int) ($datos['num_colegios'] ?? 0),
            'descripcion'       => htmlspecialchars($datos['descripcion'] ?? ''),
            'id_usuario'        => (int) ($datos['id_usuario'] ?? 0),
        ];
    }
}