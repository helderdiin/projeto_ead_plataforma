<?php
    class Clients {
        //make private
        public $id;
        public $name;
        public $email;
        public $type;

        public function __construct($id, $name, $email, $type) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->type = $type;
        }

        public static function checkForClient($id, $email) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND id <> :id");
            $stmt->execute(array(':email' => $email, ':id' => $id));
            
            return $stmt->fetch();
        }

        public static function add($name, $email, $password) {
            if (!self::checkForClient(NULL, $email)) {
                $db = Db::getInstance();

                $stmt = $db->prepare("INSERT INTO users 
                                     (id, name, email, password, type) VALUES
                                     (NULL, :name, :email, :password, :type)");

                return $stmt->execute(array(':name' => $name, 
                                     ':email' => $email, 
                                     ':password' => md5($password), 
                                     ':type' => "CLIENT"));
            } else {
                return false;
            }
        }

        public static function edit($id, $name, $email, $password) {
            if (!self::checkForClient($id, $email)) {
            	$db = Db::getInstance();

                $stmt = $db->prepare("UPDATE users 
                					 SET name = :name, 
                					 email = :email,
                					 password = :password
                					 WHERE id = :id");

                return $stmt->execute(array(':id' => $id, 
                					 ':name' => $name, 
                					 ':email' => $email, 
                					 ':password' => md5($password)));
            } else {
                return false;
            }
        }

        public static function remove($id) {
            $db = Db::getInstance();

            $stmt = $db->prepare("DELETE FROM users WHERE id = :id");

            return $stmt->execute(array(':id' => $id));
        }

        public static function getAll() {
			$db = Db::getInstance();

			$stmt = $db->prepare("SELECT * FROM users WHERE type = :type");
            $stmt->execute(array(':type' => 'CLIENT'));
            
            return $stmt->fetchAll();
        }

		public static function get($id) {
			$db = Db::getInstance();

			$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute(array(':id' => $id));
            
            $client = $stmt->fetch();

            return new Clients($client['id'], $client['name'], $client['email'], $client['type']);
        }
    }
?>