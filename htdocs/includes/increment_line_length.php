<?php
    include_once 'dbh.inc.php';

    $unit_number = $_POST['unit_number'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $company_name = $_POST['company_name'];

    $sql = "UPDATE queue_table SET line_length = line_length + 1 WHERE unit_number=$unit_number
        AND street_name='$street_address' AND country = '$country'
        AND company_name = '$company_name';";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?admin=success");
