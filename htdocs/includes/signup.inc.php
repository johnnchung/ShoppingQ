<?php
    if (isset($_POST['signup-submit'])) { 
    
    require 'dbh.inc.php';

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST["pwd-repeat"];
    $email = $_POST['email'];
    
    if (empty($username) || empty($pwd) || empty($pwdrepeat) || empty($email)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($pwd !== $pwdrepeat) {
        header("Location: ../signup.php?error=passwordcheck&mail=".$email."&uid=".$username);
        exit();
    }
    else {

        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
               
                $sql = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $pwd, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");

                    exit();
                }   
            }
        }
    }   
mysqli_stmt_close($stmt);
myslqi_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}