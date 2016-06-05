<?php 
	require_once('views/contracts/index.php');
	require_once('controllers/contracts_controller.php');
	require_once('models/contracts.php');

	$contracts = ContractsController::list();
?>

<ul class="contracts_list">
<?php foreach ($contracts as $key => $contract) { ?>
	<li class="contract<?php echo $contract['id']; ?>">
		<a href="?controller=pages&action=contracts_edit&id=<?php echo $contract['id']; ?>">Edit</a>
		<a href="?controller=contracts&action=remove&id=<?php echo $contract['id']; ?>">Remove</a>
		
		<script type="text/javascript">
		  var dates = convertMsToHumanFriendly(<?php echo $contract['dt_init']; ?>, <?php echo $contract['dt_final']; ?>);

		  $('.contract<?php echo $contract['id']; ?>').prepend(dates.dt_init + ' - ' + dates.dt_final);
		</script>
	</li>
<?php } ?>
</ul>