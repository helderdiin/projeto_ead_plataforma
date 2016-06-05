<?php
	class ContractsController {
		public function add() {
			$dt_init = trim($_POST['dt_init']);
			$dt_final = trim($_POST['dt_final']);
			$id_service = trim($_POST['id_service']);
			
			if ($dt_init && $dt_final && $id_service) {
				if (Contracts::add($dt_init, $dt_final, $id_service, $_SESSION['USER']['EMAIL'])) {
					Header("Location: index.php?controller=pages&action=contracts_list");
					exit;
				} else {
					Utils::goToErrorPage();
				}
			} else {
				Utils::goToErrorPage();
			}
		}

		public function list() {
			return Contracts::getAll($_SESSION['USER']['EMAIL'], $_SESSION['USER']['TYPE']);
		}

		public function getContract($id) {
			if ($id) {
				$contract = Contracts::get($id);

				if (is_null($contract->id)) {
					Utils::goToErrorPage();
				}

				return $contract;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$dt_init = trim($_POST['dt_init']);
			$dt_final = trim($_POST['dt_final']);
			$id_service = trim($_POST['id_service']);

			if ($dt_init && $dt_final && $id_service && $_GET['id']) {
				if (Contracts::edit($_GET['id'], $dt_init, $dt_final, $id_service, $_SESSION['USER']['EMAIL'])) {
					Header("Location: index.php?controller=pages&action=contracts_list");
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
				if (Contracts::remove($_GET['id'])) {
					Header("Location: index.php?controller=pages&action=contracts_list");
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