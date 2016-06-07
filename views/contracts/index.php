<nav class="navbar navbar-dark bg-inverse">
	<ul class="nav navbar-nav">
		<?php if (Session::getType() == 'CLIENT') { ?>
		<li class="nav-item">
			<a class="nav-link" href="?controller=pages&action=contracts_add">Add contracts</a>
		</li>
		<?php } ?>

		<li class="nav-item">
			<a class="nav-link" href="?controller=pages&action=contracts_list">List contracts</a>
		</li>
	</ul>
</nav>
<br />
<br />

<script type="text/javascript">
	selectActiveTab('contracts');
</script>