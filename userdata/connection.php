<?php
$dbServername = "localhost";
$dbUsername = "u391376576_root";
$dbPassword = "Website@123";
$dbName = "u391376576_IDE";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
session_start();
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['email'])) {
    $email = $_SESSION["email"];
    $token = $_SESSION['session_token'];
} else {
    $email = "No User";
}
