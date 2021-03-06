<?php
	class LoginController {
		public function login() {
			$loginModel = new Login();

			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($email && $password) {
				if (!is_array(Session::getSession())) {
					$user = $loginModel->login($email, $password);

					if (is_null($user['id'])) {
						Utils::goToErrorPage();
					}

					Session::setSession($user, $_POST['rememberme']);
				}

				Header("Location: index.php?controller=pages&action=home");
				exit;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function logoff() {
			Session::unsetSession();

			Header("Location: index.php?controller=pages&action=login");
			exit;
		}
	}
?>