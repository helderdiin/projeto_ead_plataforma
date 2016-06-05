<?php 
	require_once('views/clients/index.php');
	require_once('controllers/clients_controller.php');
	require_once('models/clients.php');

	$clients = ClientsController::list();
?>

<ul>
<?php foreach ($clients as $key => $client) { ?>
	<li>
		<?php echo $client['name'];?> - 
		<a href="?controller=pages&action=clients_edit&id=<?php echo $client['id']; ?>">Edit</a>
		<a href="?controller=clients&action=remove&id=<?php echo $client['id']; ?>">Remove</a>
	</li>
<?php } ?>
</ul>