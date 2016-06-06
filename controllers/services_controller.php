<?php
	class ServicesController {
		public function add() {
			$servicesModel = new Services();

			$name = trim($_POST['name']);

			if ($name) {
				if ($servicesModel->add($name)) {
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
			$servicesModel = new Services();

			return $servicesModel->getAll();
		}

		public function getService($id) {
			$servicesModel = new Services();

			if ($id) {
				$service = $servicesModel->get($id);

				if (is_null($service['id'])) {
					Utils::goToErrorPage();
				}

				return $service;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$servicesModel = new Services();

			$name = trim($_POST['name']);

			if ($name && $_GET['id']) {
				if ($servicesModel->edit($_GET['id'], $name)) {
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
			$servicesModel = new Services();

			if ($_GET['id']) {
				if ($servicesModel->remove($_GET['id'])) {
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