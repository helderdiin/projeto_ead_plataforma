<?php
	class ClientsController {
		public function add() {
			$clientsModel = new Clients();

			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($name && $email && $password) {
				if ($clientsModel->add($name, $email, $password)) {
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
			$clientsModel = new Clients();

			return $clientsModel->getAll();
		}

		public function getClient($id) {
			$clientsModel = new Clients();

			if ($id) {
				$client = $clientsModel->get($id);

				if (is_null($client['id'])) {
					Utils::goToErrorPage();
				}

				return $client;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$clientsModel = new Clients();

			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($name && $email && $password && $_GET['id']) {
				if ($clientsModel->edit($_GET['id'], $name, $email, $password)) {
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
			$clientsModel = new Clients();

			if ($_GET['id']) {
				if ($clientsModel->remove($_GET['id'])) {
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