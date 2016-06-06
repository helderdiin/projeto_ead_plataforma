<?php 
	require_once('views/contracts/index.php');
	require_once('controllers/contracts_controller.php');
	require_once('models/contracts.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');
	require_once('controllers/clients_controller.php');
	require_once('models/clients.php');

	$contractsController = new ContractsController();
	$servicesController = new ServicesController();
	$clientsController = new ClientsController();

	$contracts = $contractsController->list();
?>

<table id="contractsList" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Service</th>

			<?php if (Session::getType() == 'ADM') { ?>
			<th>Client</th>
			<?php } ?>

			<th>Initial date</th>
			<th>Final date</th>
			<th>Time to finish</th>

			<?php if (Session::getType() == 'CLIENT') { ?>
			<th>Edit</th>
			<th>Remove</th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($contracts as $key => $contract) {
				$service = $servicesController->getService($contract['id_service']);
				$client = $clientsController->getClient($contract['id_client']);
		?>
		<tr class="contract<?php echo $contract['id']; ?>">
			<td class="service"></td>

			<?php if (Session::getType() == 'ADM') { ?>
			<td class="client"></td>
			<?php } ?>
			
			<td class="dt_init"></td>
			<td class="dt_final"></td>
			<td class="timeToFinishService"></td>

			<?php if (Session::getType() == 'CLIENT') { ?>
			<td><a href="?controller=pages&action=contracts_edit&id=<?php echo $contract['id']; ?>">Edit</a></td>
			<td><a href="?controller=contracts&action=remove&id=<?php echo $contract['id']; ?>">Remove</a></td>
			<?php } ?>
		</tr>

		<script type="text/javascript">
		  var dates = convertMsToHumanFriendly(<?php echo $contract['dt_init']; ?>, <?php echo $contract['dt_final']; ?>);

		  var timeToFinishService = (<?php echo $contract['dt_final']; ?> - Date.now()) /1000 /60 /60 /24;

		  var $contract = $('.contract<?php echo $contract['id']; ?>');

		  $contract.find('.service').text('<?php echo $service['name'] ?>');
		  $contract.find('.client').text('<?php echo $client['name'] ?>');
		  $contract.find('.dt_init').text(dates.dt_init);
		  $contract.find('.dt_final').text(dates.dt_final);
		  $contract.find('.timeToFinishService').text(getDaysToFinish(timeToFinishService));
		</script>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$('#contractsList').DataTable();
</script>