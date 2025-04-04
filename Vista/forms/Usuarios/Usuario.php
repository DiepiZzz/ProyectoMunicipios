<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<body>
    <h1>Usuarios</h1>
    <ul>

    <?php if (!empty($users)) { ?>
        <ul>
            <?php foreach ($users as $user) { ?>
                <li><?php echo htmlspecialchars($user['nombre']) . ' - ' . htmlspecialchars($user['email']); ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No hay usuarios disponibles.</p>
    <?php } ?>


    </ul>
</body>

</html>