<?php 
	require_once('views/services/index.php');
	require_once('controllers/services_controller.php');
	require_once('models/services.php');

	$services = ServicesController::list();
?>

<script type="text/javascript">
	function removeService(id) {
		if (confirm('Removing this service, all contracts with it will be deleted. Continue?')) {
			location.href = '?controller=services&action=remove&id=' + id;
		}
	}
</script>

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
			<td><a href="javascript:removeService(<?php echo $service['id']; ?>);">Remove</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$('#servicesList').DataTable();
</script>