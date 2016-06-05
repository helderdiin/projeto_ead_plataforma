<?php
    class PagesController {
        public function login() {
            if (isset($_SESSION['USER']['NAME'])) {
                self::home();
            } else {
                require_once('views/login/index.php');
            }
        }
        
        public function home() {
            $name = $_SESSION['USER']['NAME'];

            require_once('views/pages/home.php');
        }

        public function clients() {
            require_once('views/clients/clients_list.php');
        }

        public function services() {
            require_once('views/services/services_list.php');
        }

        public function contracts() {
            require_once('views/contracts/contracts_list.php');
        }

        public function error() {
            require_once('views/pages/error.php');
        }

        public function clients_add() {
            require_once('views/clients/clients_add.php');
        } 

        public function clients_list() {
            require_once('views/clients/clients_list.php');
        } 

        public function clients_edit() {
            $id = $_GET['id'];
            
            require_once('views/clients/clients_edit.php');
        }

        public function services_add() {
            require_once('views/services/services_add.php');
        } 

        public function services_list() {
            require_once('views/services/services_list.php');
        } 

        public function services_edit() {
            $id = $_GET['id'];
            
            require_once('views/services/services_edit.php');
        }

        public function contracts_add() {
            require_once('views/contracts/contracts_add.php');
        } 

        public function contracts_list() {
            require_once('views/contracts/contracts_list.php');
        } 

        public function contracts_edit() {
            $id = $_GET['id'];
            
            require_once('views/contracts/contracts_edit.php');
        }
    }
?>