<DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="includes/js/libs/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/moment.min.js"></script>
		<script type="text/javascript" src="includes/js/libs/moment/pt_BR.js"></script>

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

			/*$.ajax({
				url: 'api.php/services',
				method: 'GET',
				success: function(res) {
					console.log(res);
				}
			});*/
		</script>
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