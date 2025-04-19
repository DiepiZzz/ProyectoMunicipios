<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen PDF Municipios</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        img { width: 100%; max-width: 600px; margin: 20px 0; }
    </style>
</head>
<body>
    <h2>Resumen General de Municipios</h2>
    <p>Gráfica generada:</p>
    <img src="<?= htmlspecialchars($grafico) ?>" alt="Gráfica de municipios">
    <p>Este PDF incluye la gráfica generada del municipio en cuestión</p>
</body>
</html>