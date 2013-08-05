<link rel="stylesheet" href="http://localhost/forex_ci/assets/css/style_login.css" type="text/css" media="screen" charset="utf-8">
<div id="login_form">
	<h2>Login, Admin!</h2>
	<?php 
		echo form_open('login/validate_credentials');
		echo form_input('username', 'Username');
		echo form_password('password', "Password");
		echo form_submit('submit', 'Login');
	?>
</div>