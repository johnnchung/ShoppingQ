<?php

    if (isset($_POST['data-submit'])) {
    require 'dbh.inc.php';

    $unit_number = $_POST['unit_number'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $company_name = $_POST['company_name'];
    $line_length = $_POST['line_length'];

    if (empty($unit_number) || empty($street_address) || empty($city) || empty($country) || empty($company_name) || empty($line_length)) {
        header("Location: ../admin.php?error=emptyfields&uid=");
        exit();
    }
    else {
        $sql = "SELECT unit_number FROM queue_table WHERE unit_number=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $unit_number);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../admin.php?error=unittaken");
                exit();
            }
            else {

                $sql = "INSERT INTO queue_table (unit_number, street_name, city, country, company_name, line_length) VALUES (?, ?, ?, ?, ?, ?)";
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
                }
                else {

                    mysqli_stmt_bind_param($stmt, "ssssss", $unit_number, $street_address, $city, $country, $company_name, $line_length);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admin.php?admin=success");

                    exit();
                }
            }
        }
    }
}
