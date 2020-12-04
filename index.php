<?php
require __DIR__ . '/vendor/autoload.php';
require '/i.config.php';

$router = new \Bramus\Router\Router();
$pug = new Pug();

//(/[a-z0-9_-]+)

$router->get('/', function() {
    Phug::displayFile('views/index.pug');
});

$router->run();