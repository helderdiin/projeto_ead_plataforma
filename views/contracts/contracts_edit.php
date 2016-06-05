<?php 
	require_once('views/contracts/index.php');
	require_once('controllers/contracts_controller.php');
	require_once('models/contracts.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

	$contract = ContractsController::getContract($id);
	$services = ServicesController::list();
?>

<form method="post" action="?controller=contracts&action=edit&id=<?php echo $contract->id; ?>">
    <div>
       <label for="dt_init">Initial date</label>
       <div>
          <input type="date" name="dt_init" id="dt_init" placeholder="Initial date" required>
       </div>
    </div>
    <div>
       <label for="dt_final">Final date</label>
       <div>
          <input type="date" name="dt_final" id="dt_final" placeholder="Final date" required>
       </div>
    </div>
    <div>
       <label for="id_service">Service</label>
       <div>
       	  <select name="id_service" id="id_service" required>
       	  	<option value="">Select the service</option>
       	  	<?php 
       	  		foreach ($services as $key => $service) { 
       	  			$checked = $service['id'] == $contract->id_service ? 'selected="selected"' : '';
       	  	?>
       	  		<option <?php echo $checked; ?> value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
       	  	<?php } ?>
       	  </select>
       </div>
    </div>
    <div>
       <div>
          <input type="submit" value="Edit contract">
       </div>
    </div>
</form>
<script type="text/javascript">
  var dates = convertMsToISOString(<?php echo $contract->dt_init; ?>, <?php echo $contract->dt_final; ?>);

  $('#dt_init').val(dates.dt_init);
  $('#dt_final').val(dates.dt_final);
</script>