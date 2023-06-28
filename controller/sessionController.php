<?php 
session_start();

function userSession(){
   if (!isset($_SESSION['user_id'])) {
   header("Location: /login");
}
}
function vendorSession(){
   if (!isset($_SESSION['vendor_id'])) {
   header("Location: /login");
}
}


function adminSession(){
   if (!isset($_SESSION['admin-id'])) {
   header("Location: /admin/login");
}
}
?>
