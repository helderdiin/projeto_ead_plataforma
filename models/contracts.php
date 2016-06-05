<?php
    class Contracts {
        //make private
        public $id;
        public $dt_init;
        public $dt_final;
        public $id_client;
        public $id_service;

        public function __construct($id, $dt_init, $dt_final, $id_client, $id_service) {
            $this->id = $id;
            $this->dt_init = $dt_init;
            $this->dt_final = $dt_final;
            $this->id_client = $id_client;
            $this->id_service = $id_service;
        }

        public static function add($dt_init, $dt_final, $id_service, $email) {
            $db = Db::getInstance();

            $stmt = $db->prepare("INSERT INTO contracts 
                                 (id, dt_init, dt_final, id_service, id_client) VALUES
                                 (NULL, :dt_init, :dt_final, :id_service, 
                                 (SELECT id FROM users WHERE email = :email))");

            return $stmt->execute(array(':dt_init' => strtotime($dt_init) * 1000, 
                                 ':dt_final' => strtotime($dt_final) * 1000, 
                                 ':id_service' => $id_service, 
                                 ':email' => $email));
        }

        public static function edit($id, $dt_init, $dt_final, $id_service, $email) {
            $db = Db::getInstance();

            $stmt = $db->prepare("UPDATE contracts 
                                 SET dt_init = :dt_init, 
                                 dt_final = :dt_final,
                                 id_service = :id_service,
                                 id_client = (SELECT id FROM users WHERE email = :email)
                                 WHERE id = :id");

            return $stmt->execute(array(':id' => $id, 
                                 ':dt_init' => strtotime($dt_init) * 1000, 
                                 ':dt_final' => strtotime($dt_final) * 1000, 
                                 ':id_service' => $id_service, 
                                 ':email' => $email));
        }

        public static function remove($id) {
            $db = Db::getInstance();

            $stmt = $db->prepare("DELETE FROM contracts WHERE id = :id");

            return $stmt->execute(array(':id' => $id));
        }

        public static function getAll($email, $type) {
			$db = Db::getInstance();

            if ($type == 'ADM') {
                $stmt = $db->prepare("SELECT * FROM contracts");
                $stmt->execute();
            } else {
    			$stmt = $db->prepare("SELECT * FROM contracts WHERE id_client = 
                                     (SELECT id FROM users WHERE email = :email)");
                $stmt->execute(array(':email' => $email));
            }
            
            return $stmt->fetchAll();
        }

		public static function get($id) {
			$db = Db::getInstance();

			$stmt = $db->prepare("SELECT * FROM contracts WHERE id = :id");
            $stmt->execute(array(':id' => $id));
            
            $contract = $stmt->fetch();

            return new Contracts($contract['id'], $contract['dt_init'], $contract['dt_final'], 
                                 $contract['id_client'], $contract['id_service']);
        }
    }
?>