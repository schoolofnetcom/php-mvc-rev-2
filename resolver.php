<?php

$resolver = new SON\Resolver;

$resolver['PDO'] = function ($r) {
    return new PDO('mysql:host=localhost;dbname=curso_php_mvc', 'root', null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
};

return $resolver;
