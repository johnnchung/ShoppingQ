<?php

	include_once'dbh_queue.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ShoppingQ</title>
<link href="phpStyle.css" rel="stylesheet" type="text/css">
<link rel="practicehtml.html" href="/css/master.css">
</head>

<body class="backgroundCheck">

	<div class="box-1">
	  <h1>ShoppingQ</h1>
		<h3 style="text-align: center;">Please enter the information about the store you would like to search!</p>
	</div>



<div class="structure">

	<form action ="/wait_time.php" method="POST">
	    <input type="int" name="unit_number" placeholder="Unit Number">
	    <br>
	    <input type="text" name="street_address" placeholder="Street Address">
	    <br>
	    <input type="text" name="city" placeholder="City">
	    <br>
	    <input type="text" name="country" placeholder="Country">
	    <br>
	    <input type="text" name="company_name" placeholder="Company Name">
	    <br>
	    <input type="submit" value="update"></button>
	</form>


<!--
	<form action ="/increment_line_length.php" method="POST">
	    <input type="submit" name="increment" value="Increment"></button>
	</form>

	<form action="/decrement_line_length.php" method="POST">
	    <input type="submit" name="decrement" value="Decrement"></button>
	</form>
-->

	<!--that is where the user is going to enter their information, do what ever you need to do to it. do not add id or class-->
	<!--I also need some way to pull your data from javascript. I think the man goes over that in much later videos. we can talk about this later-->
</div>

</body>
</html>
