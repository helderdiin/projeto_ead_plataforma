<?php 
	require_once('views/clients/index.php');
	require_once('controllers/clients_controller.php');
	require_once('models/clients.php');

	$client = ClientsController::getClient($id);
?>
<form method="post" action="?controller=clients&action=edit&id=<?php echo $client->id; ?>">
    <div>
       <label for="name">Name</label>
       <div>
          <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $client->name; ?>" required>
       </div>
    </div>
    <div>
       <label for="email">Email</label>
       <div>
          <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $client->email; ?>" required>
       </div>
    </div>
    <div>
       <label for="password">Password</label>
       <div>
          <input type="password" name="password" id="password" placeholder="Password" required>
       </div>
    </div>
    <div>
       <div>
          <input type="submit" value="Edit client">
       </div>
    </div>
</form>