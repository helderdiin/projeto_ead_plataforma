<?php

require_once 'connection.php';
require_once 'models/services.php';

$method  = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

$table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));

if ($table == 'services') {
    switch ($method) {
        case 'GET':
            $services = Services::getAll();

            header('Content-Type: application/json');
            echo json_encode($services);
            break;
    }
}