<?php 
	require_once('views/services/index.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

  $servicesController = new ServicesController();

	$service = $servicesController->getService($id);
?>
<form class="form-login" method="post" action="?controller=services&action=edit&id=<?php echo $service['id']; ?>">
    <div>
       <label for="name">Name</label>
       <div>
          <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $service['name']; ?>" required>
       </div>
    </div>
    <div>
       <div>
          <input type="submit" value="Edit service">
       </div>
    </div>
</form>