<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($municipio) ? 'Editar' : 'Crear' ?> Municipio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4"><?= isset($municipio) ? 'Editar' : 'Crear' ?> Municipio</h2>

        <form method="POST" action="index.php?controlador=municipio&accion=<?= isset($municipio) ? 'actualizar' : 'guardar' ?>">
            <?php if (isset($municipio)): ?>
                <input type="hidden" name="id" value="<?= $municipio->id ?>">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="<?= $municipio->nombre ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" name="departamento" class="form-control" required value="<?= $municipio->departamento ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="país" class="form-label">País</label>
                    <input type="text" name="país" class="form-control" required value="<?= $municipio->país ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alcalde" class="form-label">Alcalde</label>
                    <input type="text" name="alcalde" class="form-control" value="<?= $municipio->alcalde ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gobernador" class="form-label">Gobernador</label>
                    <input type="text" name="gobernador" class="form-control" value="<?= $municipio->gobernador ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="patronoReligioso" class="form-label">Patrono Religioso</label>
                    <input type="text" name="patronoReligioso" class="form-control" value="<?= $municipio->patronoReligioso ?? '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="numHabitantes" class="form-label">Nº Habitantes</label>
                    <input type="number" name="numHabitantes" class="form-control" value="<?= $municipio->numHabitantes ?? '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="numCasas" class="form-label">Nº Casas</label>
                    <input type="number" name="numCasas" class="form-control" value="<?= $municipio->numCasas ?? '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="numParques" class="form-label">Nº Parques</label>
                    <input type="number" name="numParques" class="form-control" value="<?= $municipio->numParques ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numColegios" class="form-label">Nº Colegios</label>
                    <input type="number" name="numColegios" class="form-control" value="<?= $municipio->numColegios ?? '' ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"><?= $municipio->descripcion ?? '' ?></textarea>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success"><?= isset($municipio) ? 'Actualizar' : 'Guardar' ?></button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="index.php?controlador=municipio&accion=index" class="text-decoration-none">Volver al listado</a>
        </div>
    </div>
</body>
</html>