<?php 
	require_once('views/clients/index.php');
	require_once('controllers/clients_controller.php');
	require_once('models/clients.php');

	$clientsController = new ClientsController();

	$clients = $clientsController->list();
?>

<script type="text/javascript">
	function removeClient(id) {
		if (confirm('Removing this client, all contracts with him will be deleted. Continue?')) {
			location.href = '?controller=clients&action=remove&id=' + id;
		}
	}
</script>

<table id="clientsList" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($clients as $key => $client) { ?>
		<tr>
			<td><?php echo $client['name'];?></td>
			<td><a href="?controller=pages&action=clients_edit&id=<?php echo $client['id']; ?>">Edit</a></td>
			<td><a href="javascript:removeClient(<?php echo $client['id']; ?>);">Remove</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$('#clientsList').DataTable();
</script>