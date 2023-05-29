<?php

require "./database.php";

if (isset($_GET['token'])) {
   $token = $_GET['token'];

   $sql = $conn->query("SELECT * FROM users WHERE token = '$token'");

   if (mysqli_num_rows($sql) > 0) {
    $sql = $conn->query("UPDATE users SET email_verified=1 WHERE token = '$token'");
    $_SESSION['email_verified'] = true;
    header('Location: /login');
   }
}