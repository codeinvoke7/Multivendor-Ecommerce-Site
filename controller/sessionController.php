<?php 
session_start();

function vendorSession(){
   if (!isset($_SESSION['id'])) {
   header("Location: /login");
}
}


function adminSession(){
   if (!isset($_SESSION['admin-id'])) {
   header("Location: /admin/login");
}
}
?>
