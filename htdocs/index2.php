<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ShoppingQ</title>
<link href="phpStyle.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #F46672;">
	<div class="box-1">
		<h1>ShoppingQ</h1>
	</div>
<?php
	if (isset($_SESSION['userId'])) {
		echo '<p class="login-status"> You are logged in! </p>';
		echo '<form action="includes/logout.inc.php" method="post">
	<button type= "submit" name= "logout-submit">Log Out</button>';
	}
	else {
		echo '<div class="structure"><p class="login-status"> You are logged out!</p></div>';
		echo '<div><h3 style="text-align: center;">Log in:</h3></div>';
		echo '<div class="structure">
		<form action="includes/login.inc.php" method="post">
		<input type= "text" name= "mailuid" placeholder="Username/E-mail">
		<br>
		<input type= "password" name= "pwd" placeholder="Password">
		<br>
		<button type= "submit" name="login-submit"> Log In </button>
	</form>
	<a href="signup.php">Sign Up</a>
	<br>
	<br>
	<a href="reset-password.php"> Forgot your password? </a>
		</div>';
	}
?>
</body>
