<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Datos Generales de Municipios</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Datos Generales por Municipio</h2>

        <!-- Gráfica -->
        <canvas id="graficaMunicipios" height="100"></canvas>

        <!-- Formulario único para enviar imagen como base64 -->
        <form id="formularioPdf" method="POST" action="index.php?controlador=municipios&accion=generarPdf">
            <input type="hidden" name="graficoBase64" id="graficoBase64">
            <button type="button" class="btn btn-primary mt-4" onclick="generarPDF()">Descargar como PDF</button>
        </form>
    </div>

    <!-- Script para crear la gráfica y generar imagen base64 -->
    <script>
        // Datos desde PHP
        const labels = <?= json_encode($labels) ?>;
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Habitantes',
                    data: <?= json_encode($habitantes) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                },
                {
                    label: 'Casas',
                    data: <?= json_encode($casas) ?>,
                    backgroundColor: 'rgba(255, 205, 86, 0.7)'
                },
                {
                    label: 'Colegios',
                    data: <?= json_encode($colegios) ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)'
                },
                {
                    label: 'Parques',
                    data: <?= json_encode($parques) ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                }
            ]
        };

        // Configuración de la gráfica
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Resumen General de Municipios'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        // Renderiza la gráfica
        const chart = new Chart(
            document.getElementById('graficaMunicipios'),
            config
        );

        // Convierte el canvas a imagen base64 y la envía al servidor
        function generarPDF() {
            const canvas = document.getElementById('graficaMunicipios');
            const base64 = canvas.toDataURL('image/png');

            // Insertamos la imagen en el input oculto
            document.getElementById('graficoBase64').value = base64;

            // Enviamos el formulario
            document.getElementById('formularioPdf').submit();
        }
    </script>
</body>

</html>