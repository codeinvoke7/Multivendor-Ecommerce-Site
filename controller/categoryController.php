<?php
require "../database.php";

if (isset($_POST['aadd-cat'])) {
    $category = $_POST['name'];
    $slug = $_POST['slug'];
    $filename = $_FILES['name'];
    $tmp = $_FILES['name']['tmp'];

    $category = filter_var($category, FILTER_SANITIZE_STRING);
    $slug = filter_var($slug, FILTER_SANITIZE_STRING);
    

    $stmt = $conn->prepare("INSERT INTO `categories` (`category`, `slug`, `image`) VALUE (?,?,?)");
    $stmt->bind_param('sss', $category, $slug, $filename);
    $result = $stmt->execute();

    if($result){
        $_SESSION['cat-addedd'] = true;
        header("Location: /admin/all/products");
    }
}