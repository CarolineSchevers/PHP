<?php
    include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styling/style_login.css">
    <title>Login</title>
</head>

<body>
	<div class="login_page">
		<h2>Login</h2>
		
		<form method="post" action="login.php">
			<?php include('errors.php'); ?>
			<input type="text" name="login_email" placeholder="Email" ><br>
			<input type="password" name="login_password" placeholder="Password"><br>
			<input type="submit" class="submit" name="login_user" value="Log in">
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
		</form>
	</div>
</body>

</html>