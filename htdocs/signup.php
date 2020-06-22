<?php
	if (isset($_GET['error'])) {
		if ($_GET['error'] =="emptyfields") {
			echo '<p class="signuperror"> Please fill in all fields! </p>';
		}
		else if ($_GET['error'] =="invalidmailuid") {
			echo '<p class="signuperro"> Invalid Username and E-mail! </p>';
		}
		else if ($_GET['error'] =="invaliduid") {
			echo '<p class="signuperro"> Invalid Username! </p>';
		}
		else if ($_GET['error'] =="invalidmail") {
			echo '<p class="signuperro"> Invalid E-mail! </p>';
		}
		else if ($_GET['error'] =="usetaken") {
			echo '<p class="signuperro"> Username is already taken! </p>';
		}
	}
	else if (isset($_GET['signup'])) {
        if ($_GET['signup'] =="success") {
        echo '<p class="signupsuccess"> Signup Successful! Please return to login page. </p>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="phpStyle.css">
	</head>
	<body class="backgroundCheck">

		<div class="box-1">
			<h1>ShoppingQ</h1>
			<h3 style="text-align: center;">Sign up page</p>
		</div>

		<div class="structure">
			<form action ="includes/signup.inc.php" method="post">
				<input type= "text" name= "username" placeholder="Username">
				<br>
				<input type= "text" name= "email" placeholder="E-mail">
				<br>
				<input type= "password" name= "pwd" placeholder="Password">
				<br>
					<input type= "password" name= "pwd-repeat" placeholder="Repeat Password">
					<br>
				<button type= "submit" name="signup-submit"> Sign up </button>
				<br>
				<a href="index.php">Return to login</a>
			</form>
		</div>
	</body>
</html>
