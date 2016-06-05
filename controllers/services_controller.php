<?php
	class ServicesController {
		public function add() {
			$name = trim($_POST['name']);

			if ($name) {
				if (Services::add($name)) {
					Header("Location: index.php?controller=pages&action=services_list");
					exit;
				} else {
					Utils::goToErrorPage();
				}
			} else {
				Utils::goToErrorPage();
			}
		}

		public function list() {
			return Services::getAll();
		}

		public function getService($id) {
			if ($id) {
				$service = Services::get($id);

				if (is_null($service->id)) {
					Utils::goToErrorPage();
				}

				return $service;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$name = trim($_POST['name']);

			if ($name && $_GET['id']) {
				if (Services::edit($_GET['id'], $name)) {
					Header("Location: index.php?controller=pages&action=services_list");
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
				if (Services::remove($_GET['id'])) {
					Header("Location: index.php?controller=pages&action=services_list");
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