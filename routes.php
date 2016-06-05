<?php
    function call($controller, $action) {
        require_once('controllers/' . $controller . '_controller.php');

        switch($controller) {
            case 'pages':
            $controller = new PagesController();
            break;
            case 'login':
            require_once('models/login.php');
            $controller = new LoginController();
            break;
            case 'clients':
            require_once('models/clients.php');
            $controller = new ClientsController();
            break;
        }

        $controller->{ $action }();
    }

    $controllers = array('pages' => ['login', 'home', 'clients', 'error', 'clients_add', 'clients_list', 'clients_edit'],
                         'login' => ['login', 'logoff'],
                         'clients' => ['add', 'list', 'edit', 'remove']);

    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            call('pages', 'error');
        }
    } else {
        call('pages', 'error');
    }
?>