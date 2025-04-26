<?php

require_once __DIR__ . '/../Modelos/Servicios/MunicipiosService.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;
use Modelos\Servicios\MunicipiosService;

class MunicipiosControlador
{

    private $municipioService;

    public function __construct()
    {
        $this->municipioService = new MunicipiosService();
    }

    // Mostrar todos los municipios
    public function index()
    {
        $municipios = $this->municipioService->listarMunicipios();
        require __DIR__ . '/../Vista/forms/Municipios/MunicipiosFormulario.php';
    }

    // Mostrar formulario de creación
    public function crear()
    {
        require __DIR__ . '/../Vista/forms/Municipios/MunicipiosRegistro.php';
    }

    // Guardar nuevo municipio
    public function guardar()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['usuario']['id_usuario'])) {
                echo "Error: No se ha iniciado sesión o falta el id del usuario.";
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';
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
    public function editar()
    {
        $id = $_GET['id_municipio'] ?? null;

        if ($id && is_numeric($id)) {
            $municipio = $this->municipioService->obtenerMunicipio($id);

            if ($municipio) {

                $usuarioRepositorio = new \Modelos\Repositorios\UsuarioRepositorio();
                $usuarios = $usuarioRepositorio->obtenerTodos();


                require __DIR__ . '/../Vista/forms/Municipios/MunicipiosEditar.php';
            } else {
                echo "Municipio no encontrado.";
            }
        } else {
            echo "ID no válido.";
        }
    }


    // Actualizar municipio
    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_municipio'] ?? null;

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
    public function eliminar()
    {
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
    private function filtrarDatos(array $datos): array
    {
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


    public function graficaGeneral()
    {
        $municipios = $this->municipioService->listarMunicipios();

        $labels = [];
        $habitantes = [];
        $casas = [];
        $colegios = [];
        $parques = [];

        foreach ($municipios as $m) {
            $labels[] = $m->nombre;
            $habitantes[] = $m->num_habitantes;
            $casas[] = $m->num_casas;
            $colegios[] = $m->num_colegios;
            $parques[] = $m->num_parques;
        }

        require __DIR__ . '/../Vista/forms/Municipios/MunicipiosGrafica.php';
    }

    public function descargarGraficaYDatosPDF()
    {

        $municipios = $this->municipioService->listarMunicipios();


        $imagenBase64 = $_POST['grafica'] ?? '';


        $tablaHTML = '<table border="1" cellspacing="0" cellpadding="5" style="width:100%; border-collapse: collapse; font-size:12px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>País</th>
                <th>Habitantes</th>
                <th>Casas</th>
                <th>Parques</th>
                <th>Colegios</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($municipios as $municipio) {
            $tablaHTML .= '<tr>
            <td>' . htmlspecialchars($municipio->nombre) . '</td>
            <td>' . htmlspecialchars($municipio->departamento) . '</td>
            <td>' . htmlspecialchars($municipio->país) . '</td>
            <td>' . htmlspecialchars($municipio->numHabitantes) . '</td>
            <td>' . htmlspecialchars($municipio->numCasas) . '</td>
            <td>' . htmlspecialchars($municipio->numParques) . '</td>
            <td>' . htmlspecialchars($municipio->numColegios) . '</td>
        </tr>';
        }

        $tablaHTML .= '</tbody></table>';

        // 4. Construir el HTML del PDF
        $html = '
        <h2 style="text-align:center;">Gráfica de Municipios</h2>
        <p style="text-align:center;">Generado el: ' . date('d/m/Y') . '</p>
        <div style="text-align:center;">
            <img src="' . $imagenBase64 . '" style="width:90%; max-width:700px; margin-bottom:30px;" />
        </div>
        <h3 style="text-align:center;">Datos de Municipios</h3>
        ' . $tablaHTML . '
        <br><hr><p style="text-align:center; font-size:10px;">Generado por el sistema municipal</p>
    ';

        // 5. Generar el PDF
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('reporte_municipios.pdf', ['Attachment' => true]);
    }

    public function generarPdf() {
        if (!isset($_POST['graficoBase64'])) {
            echo "No se recibió imagen base64";
            return;
        }
    
        $grafico = $_POST['graficoBase64'];
    
        ob_start();
        require_once './Vista/forms/Municipios/MunicipiosPdf.php';
        $html = ob_get_clean();
    
        // Ya no va require ni use aquí
    
        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', true); // Importante si usás imágenes base64
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('reporte_municipios.pdf', ['Attachment' => true]);
    }
}
