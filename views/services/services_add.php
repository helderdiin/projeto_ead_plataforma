<?php 
	require_once('views/services/index.php');
?>
<form class="form-login" method="post" action="?controller=services&action=add">
    <div>
       <label for="name">Name</label>
       <div>
          <input type="text" name="name" id="name" placeholder="Name" required>
       </div>
    </div>
    <div>
       <div>
          <input type="submit" value="Add new service">
       </div>
    </div>
</form>