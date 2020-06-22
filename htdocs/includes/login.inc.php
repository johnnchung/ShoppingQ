<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $pwduid = $_POST['pwd'];

    if (empty($mailuid) || empty($pwduid)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
    else {

        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if ($pwduid !== $row['pwd']) {
                echo '<p>Wrong password</p>';
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
            else if ($pwduid == $row['pwd']) {
                session_start(); 
                $_SESSION['userId'] = $row['uid'];
                $_SESSION['userUid'] = $row['username'];

                header("Location: ../admin.php?login=success");
                exit();
            }
            else {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        }
        else {
            header("Location: ../index.php?error=nouser");
            exit();
        }
    }
    }
}
else {
    header("Location: ../index.php");
    exit();
}