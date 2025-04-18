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
    <?php if (!empty($_POST['imagenGrafica'])): ?>
        <img src="<?= htmlspecialchars($_POST['imagenGrafica'], ENT_QUOTES, 'UTF-8') ?>" alt="graficaMunicipios">
        <p>Este PDF incluye la gráfica generada del municipio en cuestión</p>
    <?php else: ?>
        <p>No se proporcionó ninguna gráfica para mostrar.</p>
    <?php endif; ?>
</body>
</html>