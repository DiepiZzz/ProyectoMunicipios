<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../../vendor/autoload.php'; // ajusta si es necesario

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'pgsql',
    'host'      => 'localhost',
    'database'  => 'php_municipios',
    'username'  => 'postgres',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
