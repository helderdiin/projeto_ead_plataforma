<?php
    class Login {
        //make private
        public $id;
        public $name;
        public $email;
        public $password;
        public $type;

        public function __construct($id, $name, $email, $type, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->type = $type;
            $this->password = $password;
        }

        public static function login($email, $password) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $stmt->execute(array(':email' => $email, ':password' => md5($password)));
            $user = $stmt->fetch();

            return new Login($user['id'], $user['name'], $user['email'], $user['type'], $user['password']);
        }
    }
?>