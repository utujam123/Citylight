<!doctype html>
<html>
	<head>
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		 <script type ='text/javascript' language = 'javascript'>
		 	$(document).ready(function(){
		 		$('button#login_submit').click(function(){
		 			var request  = $.ajax({
		 				type : 'POST',
		 				url  : '<?php echo base_url("auth/ajax_process");?>',
		 				data :
		 					{
		 						username : $('input#username').val(),
		 						password : $('input#password').val()
		 					}
		 			});//end of ajax
				});//end of click function
		 	});//end of script
		 </script>
	</head>
	<body>
		
		
			<?php if(isset($msg)){echo $msg;}?>
			<?php echo form_error('username');?>
			<h5>Username</h5>
			<input type = 'text' name = 'username' id = 'username'>
			<br>
			<?php echo form_error('password');?>
			<h5>Password</h5>
			<input type = 'text' name = 'password' id ='password'>
			<br>
			<button id = 'login_submit'> Login </button>
		
	</body>
</html>