<?php
    class Login extends DB {
        function __construct() {
            $this->getInstance();
        }

        public function login($email, $password) {
            $stmt = $this->con->prepare("SELECT * FROM users WHERE email = :email AND password = :password");

            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
            
            $stmt->execute();
            
            return $stmt->fetch();
        }
    }
?>