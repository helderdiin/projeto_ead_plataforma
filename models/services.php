<?php
    require_once('models/contracts.php');
    
    class Services {
        //make private
        public $id;
        public $name;

        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }

        public static function checkForService($id, $name) {
            $db = Db::getInstance();

            $stmt = $db->prepare("SELECT * FROM services WHERE name = :name AND id <> :id");
            $stmt->execute(array(':name' => $name, ':id' => $id));
            
            return $stmt->fetch();
        }

        public static function add($name) {
            if (!self::checkForService("", $name)) {
                $db = Db::getInstance();

                $stmt = $db->prepare("INSERT INTO services 
                                     (id, name) VALUES
                                     (NULL, :name)");

                return $stmt->execute(array(':name' => $name));
            } else {
                return false;
            }
        }

        public static function edit($id, $name) {
            if (!self::checkForService($id, $name)) {
            	$db = Db::getInstance();

                $stmt = $db->prepare("UPDATE services 
                					 SET name = :name
                					 WHERE id = :id");

                return $stmt->execute(array(':id' => $id, 
                					 ':name' => $name));
            } else {
                return false;
            }
        }

        public static function remove($id) {
            if (Contracts::removeByService($id)) {
                $db = Db::getInstance();

                $stmt = $db->prepare("DELETE FROM services WHERE id = :id");

                return $stmt->execute(array(':id' => $id));
            } else {
                return false;
            }
        }

        public static function getAll() {
			$db = Db::getInstance();

			$stmt = $db->prepare("SELECT * FROM services");
            $stmt->execute();
            
            return $stmt->fetchAll();
        }

		public static function get($id) {
			$db = Db::getInstance();

			$stmt = $db->prepare("SELECT * FROM services WHERE id = :id");
            $stmt->execute(array(':id' => $id));
            
            $service = $stmt->fetch();

            return new Services($service['id'], $service['name']);
        }
    }
?>