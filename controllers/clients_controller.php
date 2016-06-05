<?php
	class ClientsController {
		public function add() {
			if ($_POST['name'] && $_POST['email'] && $_POST['password']) {
				if (Clients::add($_POST['name'], $_POST['email'], $_POST['password'])) {
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
			if ($_POST['name'] && $_POST['email'] && $_POST['password'] && $_GET['id']) {
				if (Clients::edit($_GET['id'], $_POST['name'], $_POST['email'], $_POST['password'])) {
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

		/*public function login() {
			if ($_POST['email'] && $_POST['password']) {
				if (!isset($_SESSION['USER']['NAME'])) {
					$user = Login::login($_POST['email'], $_POST['password']);

					if (is_null($user->id)) {
						Utils::goToErrorPage();
					}

					$_SESSION['USER']['NAME'] = $user->name;
					$_SESSION['USER']['EMAIL'] = $user->email;
					$_SESSION['USER']['TYPE'] = $user->type;
				}

				Header("Location: index.php?controller=pages&action=home");
				exit;
			}      
		}

		public function logoff() {
			unset($_SESSION['USER']);
			session_destroy();

			Header("Location: index.php?controller=pages&action=login");
			exit;
		}*/
	}
?>