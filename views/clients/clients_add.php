<?php 
	require_once('views/clients/index.php');
?>
<form method="post" action="?controller=clients&action=add">
    <div>
       <label for="name">Name</label>
       <div>
          <input type="text" name="name" id="name" placeholder="Name" required>
       </div>
    </div>
    <div>
       <label for="email">Email</label>
       <div>
          <input type="text" name="email" id="email" placeholder="Email" required>
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
          <input type="submit" value="Add new client">
       </div>
    </div>
</form>