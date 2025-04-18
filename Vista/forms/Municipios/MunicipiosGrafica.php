<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Datos Generales de Municipios</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script>
    const formulario = document.getElementById('formularioPdf');
    formulario.addEventListener('submit', function(e) {
        const canvas = document.getElementById('graficaMunicipios');
        const imagenBase64 = canvas.toDataURL('image/png');
        document.getElementById('imagenGrafica').value = imagenBase64;
    });
</script>

<script>
    const chart = new Chart(document.getElementById('graficaMunicipios'), config);

    document.querySelector('form').addEventListener('submit', function (e) {
        const canvas = document.getElementById('graficaMunicipios');
        const base64Image = canvas.toDataURL('image/png');
        document.getElementById('graficoBase64').value = base64Image;
    });
</script>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Datos Generales por Municipio</h2>
        <canvas id="graficaMunicipios" height="100"></canvas>

        <form method="post" action="index.php?controlador=municipios&accion=generarPdf">
            <input type="hidden" name="graficoBase64" id="graficoBase64">
            <button type="submit" class="btn btn-primary mt-4">Descargar PDF</button>
        </form>

        <form id="formularioPdf" method="POST" action="index.php?controlador=municipios&accion=generarPdf">
            <input type="hidden" name="imagenGrafica" id="imagenGrafica">
            <button type="submit" class="btn btn-primary mt-3">Descargar como PDF</button>
        </form>
    </div>

    <script>
        const labels = <?= json_encode($labels) ?>;
        const data = {
            labels: labels,
            datasets: [{
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

        new Chart(
            document.getElementById('graficaMunicipios'),
            config
        );
    </script>
</body>

</html>