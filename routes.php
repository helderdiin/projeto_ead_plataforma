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
            case 'services':
                require_once('models/services.php');
                $controller = new ServicesController();
                break;
            case 'contracts':
                require_once('models/contracts.php');
                $controller = new ContractsController();
                break;
        }

        $controller->{ $action }();
    }

    $controllers = array('pages' => ['login', 'home', 'clients', 'services', 'contracts', 
                         'error', 'clients_add', 'clients_list', 'clients_edit', 'services_add', 
                         'services_list', 'services_edit', 'contracts_add', 'contracts_list', 'contracts_edit'],

                         'login' => ['login', 'logoff'],
                         'clients' => ['add', 'list', 'edit', 'remove'],
                         'services' => ['add', 'list', 'edit', 'remove'],
                         'contracts' => ['add', 'list', 'edit', 'remove']);

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