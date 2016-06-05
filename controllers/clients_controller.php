<?php
	class ClientsController {
		public function add() {
			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($name && $email && $password) {
				if (Clients::add($name, $email, $password)) {
					Header("Location: index.php?controller=pages&action=clients_list");
					exit;
				} else {
					Utils::goToErrorPage();
				}
			} else {
				Utils::goToErrorPage();
			}
		}

		public function list() {
			return Clients::getAll();
			
			/*echo '<pre>';
			var_dump($list); die();
			echo '</pre>';*/
		}

		public function getClient($id) {
			if ($id) {
				$client = Clients::get($id);

				if (is_null($client->id)) {
					Utils::goToErrorPage();
				}

				return $client;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($name && $email && $password && $_GET['id']) {
				if (Clients::edit($_GET['id'], $name, $email, $password)) {
					Header("Location: index.php?controller=pages&action=clients_list");
					exit;
				} else {
					Utils::goToErrorPage();	
				}
			} else {
				Utils::goToErrorPage();
			}
		}

		public function remove() {
			if ($_GET['id']) {
				if (Clients::remove($_GET['id'])) {
					Header("Location: index.php?controller=pages&action=clients_list");
					exit;
				} else {
					Utils::goToErrorPage();
				}
			} else {
				Utils::goToErrorPage();
			}
		}
	}
?>