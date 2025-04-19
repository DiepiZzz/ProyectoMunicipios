<?php
function safeValue($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Municipios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Barra superior -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Listado de Municipios</h2>
            <div>
                <a href="index.php?controlador=municipios&accion=formularioCrear" class="btn btn-primary">Agregar Municipio</a>
                <a href="index.php?controlador=municipios&accion=graficaGeneral" class="btn btn-info ms-2">Ver Gráfica</a>
                <a href="index.php?controlador=login&accion=cerrarSesion" class="btn btn-outline-secondary ms-2">Cerrar sesión</a>
            </div>
        </div>

        <!-- Tabla de municipios -->
        <?php if (isset($municipios) && count($municipios) > 0): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>País</th>
                        <th>Alcalde</th>
                        <th>Gobernador</th>
                        <th>Patrono Religioso</th>
                        <th>Nº Habitantes</th>
                        <th>Nº Casas</th>
                        <th>Nº Parques</th>
                        <th>Nº Colegios</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($municipios as $municipio): ?>
                        <tr>
                            <td><?= safeValue($municipio->nombre) ?></td>
                            <td><?= safeValue($municipio->departamento) ?></td>
                            <td><?= safeValue($municipio->pais) ?></td>
                            <td><?= safeValue($municipio->alcalde) ?></td>
                            <td><?= safeValue($municipio->gobernador) ?></td>
                            <td><?= safeValue($municipio->patron_religioso) ?></td>
                            <td><?= safeValue($municipio->num_habitantes) ?></td>
                            <td><?= safeValue($municipio->num_casas) ?></td>
                            <td><?= safeValue($municipio->num_parques) ?></td>
                            <td><?= safeValue($municipio->num_colegios) ?></td>
                            <td><?= safeValue($municipio->descripcion) ?></td>
                            <td>
                                <a href="index.php?controlador=municipios&accion=formularioEditar&id_municipio=<?= $municipio->id_municipio ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?controlador=municipios&accion=eliminar&id=<?= $municipio->id_municipio ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este municipio?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center">
                No hay municipios registrados por el momento.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>