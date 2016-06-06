<?php
    class Contracts extends DB {
        function __construct() {
            $this->getInstance();
        }

        public function add($dt_init, $dt_final, $id_service, $email) {
            $stmt = $this->con->prepare("INSERT INTO contracts 
                                 (id, dt_init, dt_final, id_service, id_client) VALUES
                                 (NULL, :dt_init, :dt_final, :id_service, 
                                 (SELECT id FROM users WHERE email = :email))");

            $stmt->bindValue(':dt_init', strtotime($dt_init) * 1000, PDO::PARAM_INT);
            $stmt->bindValue(':dt_final', strtotime($dt_final) * 1000, PDO::PARAM_INT);
            $stmt->bindValue(':id_service', $id_service, PDO::PARAM_INT);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            return $stmt->execute();
        }

        public function edit($id, $dt_init, $dt_final, $id_service, $email) {
            $stmt = $this->con->prepare("UPDATE contracts 
                                 SET dt_init = :dt_init, 
                                 dt_final = :dt_final,
                                 id_service = :id_service,
                                 id_client = (SELECT id FROM users WHERE email = :email)
                                 WHERE id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':dt_init', strtotime($dt_init) * 1000, PDO::PARAM_INT);
            $stmt->bindValue(':dt_final', strtotime($dt_final) * 1000, PDO::PARAM_INT);
            $stmt->bindValue(':id_service', $id_service, PDO::PARAM_INT);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            return $stmt->execute();
        }

        public function remove($id) {
            $stmt = $this->con->prepare("DELETE FROM contracts WHERE id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function removeByClient($id_client) {
            $stmt = $this->con->prepare("DELETE FROM contracts WHERE id_client = :id_client");

            $stmt->bindValue(':id_client', $id_client, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function removeByService($id_service) {
            $stmt = $this->con->prepare("DELETE FROM contracts WHERE id_service = :id_service");

            $stmt->bindValue(':id_service', $id_service, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function getAll($email, $type) {
            if ($type == 'ADM') {
                $stmt = $this->con->prepare("SELECT * FROM contracts");
                
                $stmt->execute();
            } else {
    			$stmt = $this->con->prepare("SELECT * FROM contracts WHERE id_client = 
                                     (SELECT id FROM users WHERE email = :email)");

                $stmt->bindValue(':email', $email, PDO::PARAM_STR);                
                
                $stmt->execute();
            }
            
            return $stmt->fetchAll();
        }

		public function get($id) {
			$stmt = $this->con->prepare("SELECT * FROM contracts WHERE id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            return $stmt->fetch();
        }
    }
?>