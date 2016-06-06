<!DOCTYPE html> 
<html lang="en">
	<head>
		<script type="text/javascript" src="includes/js/libs/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/bootstrap.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/lodash.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/moment.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/moment/pt_BR.js"></script>

		<link rel="stylesheet" type="text/css" href="includes/css/libs/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="includes/css/libs/bootstrap.min.css">

		<script type="text/javascript">
			moment.locale('pt-br');
			function convertMsToISOString(dt_init, dt_final) {
				return {
					'dt_init': new Date(dt_init).toISOString().substring(0, 10),
					'dt_final': new Date(dt_final).toISOString().substring(0, 10)
				};
			}

			function convertMsToHumanFriendly(dt_init, dt_final) {
				return {
					'dt_init': moment(dt_init).format('L'),
					'dt_final': moment(dt_final).format('L')
				};
			}

			function getDaysToFinish(timeToFinishService) {
				if (timeToFinishService > 0) {
					return parseInt(timeToFinishService) + ' days to finish this service';
				} else {
					return 'service finished.'
				}
			}

			/*$.ajax({
				url: 'api.php/services',
				method: 'GET',
				success: function(res) {
					console.log(res);
				}
			});*/
		</script>

		<meta name="viewport" content="width=device­width, initial­scale=1">
	</head>
	<body>
		<?php if (is_array(Session::getSession())) { ?>
		<header>
			<a href='/empresa'>Home</a>
			<?php if (Session::getType() == 'ADM') { ?>
			<a href='?controller=pages&action=clients'>Manage clients</a>
			<a href='?controller=pages&action=services'>Manage services</a>
			<a href='?controller=pages&action=contracts_list'>Manage contracts</a>
			<?php } ?>
			<?php if (Session::getType() == 'CLIENT') { ?>
			<a href='?controller=pages&action=contracts'>Manage contracts</a>
			<?php } ?>
			<a href='?controller=login&action=logoff'>Logoff</a>
		</header>
		<?php } ?>

		<?php require_once('routes.php'); ?>
	<body>
<html>