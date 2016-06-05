<?php
	class Utils {
		public function goToErrorPage() {
			Header("Location: index.php?controller=pages&action=error");
			exit;
		}
	}
?>