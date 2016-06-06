<?php
    require_once('models/contracts.php');

    class Services extends DB {
        function __construct() {
            $this->getInstance();
        }

        public function checkForService($id, $name) {
            $stmt = $this->con->prepare("SELECT * FROM services WHERE name = :name AND id <> :id");

            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            return $stmt->fetch();
        }

        public function add($name) {
            if (!$this->checkForService("", $name)) {
                $stmt = $this->con->prepare("INSERT INTO services 
                                     (id, name) VALUES
                                     (NULL, :name)");

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function edit($id, $name) {
            if (!$this->checkForService($id, $name)) {
                $stmt = $this->con->prepare("UPDATE services 
                					 SET name = :name
                					 WHERE id = :id");
                
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function remove($id) {
            $contractsModel = new Contracts();

            if ($contractsModel->removeByService($id)) {
                $stmt = $this->con->prepare("DELETE FROM services WHERE id = :id");

                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                return $stmt->execute();
            } else {
                return false;
            }
        }

        public function getAll() {
			$stmt = $this->con->prepare("SELECT * FROM services");
            
            $stmt->execute();
            
            return $stmt->fetchAll();
        }

		public function get($id) {
			$stmt = $this->con->prepare("SELECT * FROM services WHERE id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            return $stmt->fetch();
        }
    }
?>