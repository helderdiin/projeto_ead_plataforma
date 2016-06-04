<?php
    class PagesController {
        public function login() {
            require_once('views/login/index.php');
        }
        
        public function home() {
            $name = $_SESSION['USER']['NAME'];

            require_once('views/pages/home.php');
        }

        public function error() {
            require_once('views/pages/error.php');
        }
    }
?>