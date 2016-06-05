<?php
    session_start();
    require 'utils.php';
    require 'models/session.php';
    require_once('connection.php');

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        if (is_array(Session::getSession())) {
            $controller = 'pages';
            $action = 'home';
        } else {
            $controller = 'pages';
            $action = 'login';
        }
    }

    require_once('views/layout.php');
?>