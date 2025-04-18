<?php
function safeValue($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Municipio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Editar Municipio</h2>

        <form action="index.php?controlador=municipios&accion=actualizar" method="POST">
            <input type="hidden" name="id_municipio" value="<?= safeValue($municipio->id_municipio) ?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= safeValue($municipio->nombre) ?>" required>
            </div>

            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <input type="text" class="form-control" name="departamento" value="<?= safeValue($municipio->departamento) ?>" required>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" class="form-control" name="pais" value="<?= safeValue($municipio->pais) ?>" required>
            </div>

            <div class="mb-3">
                <label for="alcalde" class="form-label">Alcalde</label>
                <input type="text" class="form-control" name="alcalde" value="<?= safeValue($municipio->alcalde) ?>">
            </div>

            <div class="mb-3">
                <label for="gobernador" class="form-label">Gobernador</label>
                <input type="text" class="form-control" name="gobernador" value="<?= safeValue($municipio->gobernador) ?>">
            </div>

            <div class="mb-3">
                <label for="num_habitantes" class="form-label">Número de Habitantes</label>
                <input type="number" class="form-control" name="num_habitantes" value="<?= safeValue($municipio->num_habitantes) ?>" required>
            </div>

            <div class="mb-3">
                <label for="num_casas" class="form-label">Número de Casas</label>
                <input type="number" class="form-control" name="num_casas" value="<?= safeValue($municipio->num_casas) ?>">
            </div>

            <div class="mb-3">
                <label for="num_parques" class="form-label">Número de Parques</label>
                <input type="number" class="form-control" name="num_parques" value="<?= safeValue($municipio->num_parques) ?>">
            </div>

            <div class="mb-3">
                <label for="num_colegios" class="form-label">Número de Colegios</label>
                <input type="number" class="form-control" name="num_colegios" value="<?= safeValue($municipio->num_colegios) ?>">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3"><?= safeValue($municipio->descripcion) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="patron_religioso" class="form-label">Patrono Religioso</label>
                <input type="text" class="form-control" name="patron_religioso" value="<?= safeValue($municipio->patron_religioso) ?>">
            </div>

            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuario Responsable</label>
                <select name="id_usuario" class="form-select" required>
                    <option value="">Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario->id_usuario ?>" <?= $usuario->id_usuario == $municipio->id_usuario ? 'selected' : '' ?>>
                            <?= safeValue($usuario->nombre) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php?controlador=municipios&accion=index" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
