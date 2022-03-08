<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danau</title>
</head>
<body>
	<h1>Selamat Datang</h1>
	<a href="<?php echo base_url().'admin/agenda'?>">del</a><br>
	<a href="<?php echo base_url().'customers/login'?>">Contoh Login</a><br>

	<a href="<?php echo base_url().'customers/register'?>">Contoh Register</a><br>

	<a class="nav-link" href="<?php echo site_url('about');?>">About</a><br>
	
	<a href="<?php echo base_url().'customers/destinasi'?>">Destinasi</a><br>

	<a href="<?php echo base_url().'admin/login/logout'?>" class="btn btn-default btn-flat">Sign out</a>
</body>
</html>