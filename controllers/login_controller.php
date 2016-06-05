<?php
	class LoginController {
		public function login() {
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($email && $password) {
				if (!is_array(Session::getSession())) {
					$user = Login::login($email, $password);

					if (is_null($user->id)) {
						Utils::goToErrorPage();
					}

					Session::setSession($user);
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