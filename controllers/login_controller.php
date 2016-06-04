<?php
	class LoginController {
		public function login() {
			if ($_POST['email'] && $_POST['password']) {
				if (!isset($_SESSION['USER']['NAME'])) {
					$user = Login::login($_POST['email'], $_POST['password']);

					if (is_null($user->id)) {
						Header("Location: index.php?controller=pages&action=error");
						exit;
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
		}
	}
?>