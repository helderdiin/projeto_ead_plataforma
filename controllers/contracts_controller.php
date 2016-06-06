<?php
	class ContractsController {
		public function add() {
			$contractsModel = new Contracts();

			$dt_init = trim($_POST['dt_init']);
			$dt_final = trim($_POST['dt_final']);
			$id_service = trim($_POST['id_service']);
			
			if ($dt_init && $dt_final && $id_service) {
				if ($contractsModel->add($dt_init, $dt_final, $id_service, Session::getEmail())) {
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
			$contractsModel = new Contracts();

			return $contractsModel->getAll(Session::getEmail(), Session::getType());
		}

		public function getContract($id) {
			$contractsModel = new Contracts();

			if ($id) {
				$contract = $contractsModel->get($id);

				if (is_null($contract['id'])) {
					Utils::goToErrorPage();
				}

				return $contract;
			} else {
				Utils::goToErrorPage();
			}
		}

		public function edit() {
			$contractsModel = new Contracts();

			$dt_init = trim($_POST['dt_init']);
			$dt_final = trim($_POST['dt_final']);
			$id_service = trim($_POST['id_service']);

			if ($dt_init && $dt_final && $id_service && $_GET['id']) {
				if ($contractsModel->edit($_GET['id'], $dt_init, $dt_final, $id_service, Session::getEmail())) {
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
			$contractsModel = new Contracts();
			
			if ($_GET['id']) {
				if ($contractsModel->remove($_GET['id'])) {
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