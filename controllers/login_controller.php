<?php
	class LoginController {
		public function login() {
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			if ($email && $password) {
				if (!isset($_SESSION['USER']['NAME'])) {
					$user = Login::login($email, $password);

					if (is_null($user->id)) {
						Utils::goToErrorPage();
					}

					$_SESSION['USER']['NAME'] = $user->name;
					$_SESSION['USER']['EMAIL'] = $user->email;
					$_SESSION['USER']['TYPE'] = $user->type;
				}

				Header("Location: index.php?controller=pages&action=home");
				exit;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function logoff() {
			unset($_SESSION['USER']);
			session_destroy();

			Header("Location: index.php?controller=pages&action=login");
			exit;
		}
	}
?>