<?php
$hostname = 'localhost';
$username = 'm-vendor';
$password = 'wS1Mu5H[FD67[K/v';
$dbname = 'm-vendor';

$conn = new mysqli($hostname, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die('Connection failed:' . $conn->connect_error);
// }else{
//     echo "Connected";
// }