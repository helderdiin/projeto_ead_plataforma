<?php 
	require_once('views/contracts/index.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

  $servicesController = new ServicesController();

	$services = $servicesController->list();
?>
<form method="post" action="?controller=contracts&action=add">
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
       	  	<?php foreach ($services as $key => $service) { ?>
       	  	<option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
       	  	<?php } ?>
       	  </select>
       </div>
    </div>
    <div>
       <div>
          <input type="submit" value="Add new contract">
       </div>
    </div>
</form>