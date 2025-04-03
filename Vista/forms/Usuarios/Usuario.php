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

        <?php if (isset($users) && is_array($users) && count($users) > 0) { ?>
            <ul>


                <?php foreach ($users as $user) { ?>
                    <li>
                    <strong>Id:</strong><?php echo htmlspecialchars($user['id_usuario']); ?><br>
                    <strong>Nombre:</strong> <?php echo htmlspecialchars($user['nombre']); ?>
                
                </li>
                <hr>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No hay usuarios disponibles.</p>
        <?php } ?>


    </ul>
</body>

</html>