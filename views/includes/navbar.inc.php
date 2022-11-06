<style>

</style>
<nav class=""id="sidebar" class='mx-lt-5 bg-dark'>
	<aside class="sidebar-list bg-dark">
		<a href="temp.php?page=admin/users" class="nav-item nav-home mx-3">
			<span class='icon-field'><i class="fa fa-users"></i></span>
			<span>Users</span>
		</a>

		<a href="index.php?page=admin/profile" class="nav-item nav-users mt-3 mx-3">
			<span class='icon-field'><i class="fa fa-user-circle"></i></span>
			<span>Profile</span>
		</a>

		<a href="index.php?page=claim/claim" class="nav-item nav-files mt-3 mx-3">
			<span class='icon-field'><i class="fa fa-file"></i></span>
			<span>Claims</span>
		</a>	

		<a href="index.php?page=claimant/claimant" class="nav-item nav-users mt-3 mx-3">
			<span class='icon-field'><i class="fa fa-user-injured"></i></span>
			<span>Claimants</span>
		</a>

		<a href="index.php?page=document/document" class="nav-item nav-users mt-3 mx-3">
			<span class='icon-field'><i class="fa fa-file-archive"></i></span>
			<span>Documents</span>
		</a>
	</aside>
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>