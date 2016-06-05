<?php 
	require_once('views/services/index.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

	$services = ServicesController::list();
?>

<ul>
<?php foreach ($services as $key => $service) { ?>
	<li>
		<?php echo $service['name'];?> - 
		<a href="?controller=pages&action=services_edit&id=<?php echo $service['id']; ?>">Edit</a>
		<a href="?controller=services&action=remove&id=<?php echo $service['id']; ?>">Remove</a>
	</li>
<?php } ?>
</ul>