<?php
    require_once('models/contracts.php');

    class Clients extends DB {
        function __construct() {
            $this->getInstance();
        }

        public function checkForClient($id, $email) {
            $stmt = $this->con->prepare("SELECT * FROM users WHERE email = :email AND id <> :id");

            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            
            return $stmt->fetch();
        }

        public function add($name, $email, $password) {
            if (!$this->checkForClient("", $email)) {
                $stmt = $this->con->prepare("INSERT INTO users 
                                     (id, name, email, password, type) VALUES
                                     (NULL, :name, :email, :password, :type)");

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
                $stmt->bindValue(':type', 'CLIENT', PDO::PARAM_STR);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function edit($id, $name, $email, $password) {
            if (!$this->checkForClient($id, $email)) {
                $stmt = $this->con->prepare("UPDATE users 
                					 SET name = :name, 
                					 email = :email,
                					 password = :password
                					 WHERE id = :id");

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function remove($id) {
            $contractsModel = new Contracts();

            if ($contractsModel->removeByClient($id)) {
                $stmt = $this->con->prepare("DELETE FROM users WHERE id = :id");

                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function getAll() {
			$stmt = $this->con->prepare("SELECT * FROM users WHERE type = :type");

            $stmt->bindValue(':type', 'CLIENT', PDO::PARAM_STR);

            $stmt->execute();
            
            return $stmt->fetchAll();
        }

		public function get($id) {
			$stmt = $this->con->prepare("SELECT * FROM users WHERE id = :id");
            
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            return $stmt->fetch();
        }
    }
?>