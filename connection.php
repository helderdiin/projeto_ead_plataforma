<?php
    abstract class DB {
        protected $con = NULL;

        public function getInstance() {
            if (is_null($this->con)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                
                $this->con = new PDO('mysql:host=localhost;dbname=php_empresa', 'root', '', $pdo_options);
            }
        }
    }
?>