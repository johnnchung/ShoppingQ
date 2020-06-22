<?php

$dbServername = "localhost"; //actual servername of the online server
$dbUsername = "root"; //actual username of the online server
$dbPassword = ""; //actual password of the online server
$dbName = "shoppingqueue_login";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}