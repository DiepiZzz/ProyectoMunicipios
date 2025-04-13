<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\DatabasePresenceVerifier;

require_once __DIR__ . '/vendor/autoload.php';

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'pgsql',
    'host'      => '127.0.0.1',
    'database'  => 'php_municipios', 
    'username'  => 'postgres',      
    'password'  => 'root',  
    'charset'   => 'utf8',
    'prefix'    => '',
    'schema'    => 'public',
]);

$capsule->setEventDispatcher(new Dispatcher(new Container()));
$capsule->setAsGlobal();
$capsule->bootEloquent();

$translator = new Translator(new ArrayLoader(), 'es');

$validatorFactory = new ValidatorFactory($translator);

$presenceVerifier = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validatorFactory->setPresenceVerifier($presenceVerifier);

Container::getInstance()->instance(ValidatorFactory::class, $validatorFactory);

