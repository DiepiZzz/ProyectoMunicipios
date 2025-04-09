<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Cambiar Contraseña</h3>

                        <!-- Mostrar mensaje si existe -->
                        <?php if (isset($mensaje) && $mensaje !== '') : ?>
                            <div class="alert alert-info text-center">
                                <?= htmlspecialchars($mensaje) ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="index.php?controlador=password&accion=actualizarPassword">
                            <!-- Pasar el token como hidden input -->
                            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? ($_POST['token'] ?? '')) ?>">

                            <div class="mb-3">
                                <label for="nueva_password" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="nueva_password" name="nueva_password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Actualizar Contraseña</button>
                            </div>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="index.php?controlador=login&accion=index" class="text-decoration-none">Volver al Login</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>