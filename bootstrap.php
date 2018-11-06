<?php

require __DIR__ . '/vendor/autoload.php';
$router = require __DIR__ . '/router.php';
$resolver = require __DIR__ . '/resolver.php';

$object = $router->handler();

$resolver->handler($object['class'], $object['action']);
