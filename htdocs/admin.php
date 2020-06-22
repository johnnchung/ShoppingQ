<?php
    session_start();

    include_once 'includes/dbh.inc.php';
?>

<body>
<?php

	if (isset($_SESSION['userId'])) {
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Welcome back", " ", $row['username'];
            }
        }

	}


?>

<!---this is the part that will be used to create a new user. Figure out how to assign each user unique uid urself, and also the email checking thing and password checking thing--->
<form action="includes/address_insert.php" method="post">
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
    <input type="int" name="line_length" placeholder="Line Length">
    <br>
    <button type="submit" name="data-submit">Submit</button>
    </form>

<form action="includes/increment_line_length.php" method="POST">
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
    <button type="submit" name="increment" value="increment"> Increment </button>
</form>

<form action="includes/decrement_line_length.php" method="POST">
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
    <button type="submit" name="decrement" value="Decrement"> Decrement </button>
</form>
</body>

<form action="includes/logout.inc.php" method="post">
    <button type= "submit" name= "logout-submit">Log Out</button>
</form>
