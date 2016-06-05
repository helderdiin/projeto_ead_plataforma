<?php 
	require_once('views/contracts/index.php');
	require_once('controllers/contracts_controller.php');
	require_once('models/contracts.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');
	require_once('controllers/clients_controller.php');
	require_once('models/clients.php');

	$contracts = ContractsController::list();
?>

<ul class="contracts_list">
<?php 
		foreach ($contracts as $key => $contract) {
			$service = ServicesController::getService($contract['id_service']);
			$client = ClientsController::getClient($contract['id_client']);
?>
	<li class="contract<?php echo $contract['id']; ?>">
		<?php if ($_SESSION['USER']['TYPE'] == 'CLIENT') { ?>
		<a href="?controller=pages&action=contracts_edit&id=<?php echo $contract['id']; ?>">Edit</a>
		<a href="?controller=contracts&action=remove&id=<?php echo $contract['id']; ?>">Remove</a>
		<?php } ?>
		
		<script type="text/javascript">
		  var dates = convertMsToHumanFriendly(<?php echo $contract['dt_init']; ?>, <?php echo $contract['dt_final']; ?>);

		  var timeToFinishService = (<?php echo $contract['dt_final']; ?> - Date.now()) /1000 /60 /60 /24;

		  function getDaysToFinish(timeToFinishService) {
		  	if (timeToFinishService > 0) {
		  		return parseInt(timeToFinishService) + ' days to finish this service';
		  	} else {
		  		return 'service finished.'
		  	}
		  }

		  $('.contract<?php echo $contract['id']; ?>').prepend(
		  		dates.dt_init + ' - ' + 
		  		dates.dt_final + ' - ' + 
		  		'<?php echo $service->name ?>' + ' - ' + 
		  		'<?php echo $client->name ?>' + ' - ' + 
		  		getDaysToFinish(timeToFinishService));
		</script>
	</li>
<?php } ?>
</ul>