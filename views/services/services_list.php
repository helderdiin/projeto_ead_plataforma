<?php 
	require_once('views/services/index.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

	$services = ServicesController::list();
?>

<table id="servicesList" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($services as $key => $service) { ?>
		<tr>
			<td><?php echo $service['name'];?></td>
			<td><a href="?controller=pages&action=services_edit&id=<?php echo $service['id']; ?>">Edit</a></td>
			<td><a href="?controller=services&action=remove&id=<?php echo $service['id']; ?>">Remove</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$('#servicesList').DataTable();
</script>