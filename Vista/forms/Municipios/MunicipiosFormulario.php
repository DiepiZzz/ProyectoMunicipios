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
                        <th>Nº Habitantes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($municipios as $municipio): ?>
                        <tr>
                            <td><?= htmlspecialchars($municipio->nombre) ?></td>
                            <td><?= htmlspecialchars($municipio->departamento) ?></td>
                            <td><?= htmlspecialchars($municipio->país) ?></td>
                            <td><?= htmlspecialchars($municipio->alcalde) ?></td>
                            <td><?= htmlspecialchars($municipio->gobernador) ?></td>
                            <td><?= htmlspecialchars($municipio->numHabitantes) ?></td>
                            <td>
                                <a href="index.php?controlador=municipios&accion=formularioEditar&id=<?= $municipio->id_municipios ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?controlador=municipios&accion=eliminar&id=<?= $municipio->id_municipios ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro que deseas eliminar este municipio?')">Eliminar</a>
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