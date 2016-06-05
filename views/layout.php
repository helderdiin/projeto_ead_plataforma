<DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php if (isset($_SESSION['USER']['NAME'])) { ?>
		<header>
			<a href='/empresa'>Home</a>
			<?php if ($_SESSION['USER']['TYPE'] == 'ADM') { ?>
			<a href='?controller=pages&action=clients'>Manage clients</a>
			<?php } ?>
			<a href='?controller=login&action=logoff'>Logoff</a>
		</header>
		<?php } ?>

		<?php require_once('routes.php'); ?>
	<body>
<html>