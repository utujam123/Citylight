<!doctype html>
<html>
	<head>
	</head>
	<body>
		
		<form method="POST" action = "<?php echo base_url('auth/process');?>">
			<?php if(isset($msg)){echo $msg;}?>
			<?php echo form_error('username');?>
			<h5>Username</h5>
			<input type = 'text' name = 'username'>
			<br>
			<?php echo form_error('password');?>
			<h5>Password</h5>
			<input type = 'text' name = 'password'>
			<br>
			<input type="submit" value = "Submit">
		</form>
	</body>
</html>