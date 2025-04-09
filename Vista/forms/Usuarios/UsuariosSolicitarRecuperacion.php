<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow rounded">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Recuperar Contraseña</h4>

                    <?php if (isset($mensaje)) : ?>
                        <div class="alert alert-info text-center"><?= htmlspecialchars($mensaje) ?></div>
                    <?php endif; ?>

                    <form method="POST" action="index.php?controlador=password&accion=enviarToken">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enviar enlace</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="index.php?controlador=login&accion=index">Volver al inicio de sesión</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>