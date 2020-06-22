<?php

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if (empty($pw) || empty($pwRepeat)) {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    }
    else if ($pw !== $pwRepeat) {
        header("Location: ../create-new-password.php?newpwd=pwdnotsame");
        exit();
}

    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql ="SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= $currentDate";

    $stmt = mysqli_stmt_init($conn);
    if (!myslqi_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to resubmit your reset request"
            exit();
        }
        else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify(($tokenBin), $row['pwdResetToken']);

            if ($tokenCheck === false) {
                echo "You need ot re-submit your reset request.";
                exit();
            }
            else if ($tokenCheck === true) {

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email =?";
                $stmt = mysqli_stmt_init($conn);
                if (!myslqi_stmt_prepare($stmt, $sql)) {
                    echo "There was an error";
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error"
                        exit();
                }
                else {

                    $sql = "UPDATE users SET pwd=? WHERE email =?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!myslqi_stmt_prepare($stmt, $sql)) {
                        echo "There was an error";
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "ss", $pwd, $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!myslqi_stmt_prepare($stmt, $sql)) {
                            echo "There was an error";
                            exit();
                    }
                        else {
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../signup.php?newpwd=passwordupdated");
                }
        }
}
else {
    header("Location: ../index.php")
}
