<?php

$dsn = 'pgsql:host=localhost;dbname=php_municipios';
$usuario = "postgres";
$contraseña = "root";

try {
    $pdo = new PDO($dsn, $usuario, $contraseña, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "✅ Conexión exitosa.<br>";

    $stmt = $pdo->query("SELECT * FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($usuarios);
    echo "</pre>";

} catch (PDOException $e) {
    echo "❌ Error en la conexión: " . $e->getMessage();
}
?>