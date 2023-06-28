<?php
session_start();
require "./database.php";

// admin login
if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $error= [];
    if (!empty($email) && !empty($password)) {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email address format";
       }

       $sql = $conn->query("SELECT * FROM `admin` WHERE `email` = '$email'");
        $row = $sql->fetch_assoc();


        if (empty($errors)) {
           if ($row && password_verify($password, $row['password']) && $row['role'] === 'admin') {
            $_SESSION['admin-id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['message'] = 'Login successful';
            $_SESSION['alert-type'] = 'success';

            header("Location: /admin/dashboard");
            exit();
        }else{
               $error['invalid-field'] = "Wrong email or password";

           }
        }
    }else{
        $error['invalid-field'] = 'Fields must not be empty';
    }

    if (!empty($error)) {
        $_SESSION['login_data'] = $_POST;
        $_SESSION['error'] = $error;
        header("Location: /admin/login");
        exit();
    }
}//End Method



function toggleActive($conn, $id){
    $sql = $conn->query("SELECT * FROM `users` WHERE id = $id");
    $row = $sql->fetch_assoc();

    if ($row['status'] === '0') {

        $stmt = $conn->prepare("UPDATE `users` SET `status`= '1' WHERE id = ?");
        $stmt->bind_param('s', $id);
        $result = $stmt->execute();
       
        if ($result) {
            $_SESSION['message'] = 'User Active';
            $_SESSION['alert-type'] = 'success';
        }
    }
}




function toggleInactive($conn, $id){

    $sql = $conn->query("SELECT * FROM `users` WHERE id = $id");
    $row = $sql->fetch_assoc();

    if ($row['status'] === '1') {

        $stmt = $conn->prepare("UPDATE `users` SET `status`= '0' WHERE id = ?");
        $stmt->bind_param('s', $id);
        $result = $stmt->execute();
       
        if ($result) {
            $_SESSION['message'] = 'User Inactive';
            $_SESSION['alert-type'] = 'success';
        }
    }
}

function adminProfileUpdate($conn){

    $old_photo = '';
    $stmt = $conn->prepare("SELECT photo FROM `admin` WHERE id = ?");
    $stmt->bind_param("s", $_SESSION['admin-id']);
    $stmt->execute();
    $stmt->bind_result($old_photo);
    $stmt->fetch();
    $stmt->close();

    if (isset($_POST['adminProfileUpdate'])) {
        $email = $_POST['email'];
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $destination = "./views/public/uploads/admin_Images/" . $photo;

        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($tmp, $destination);
            if(!empty($old_photo) && file_exists($old_photo)){
                unlink($old_photo);
            }
        }else {
            $destination = $old_photo;
        }

        $stmt = $conn->prepare("UPDATE `admin` SET email = ?, photo = ? WHERE id = ?");
        $stmt->bind_param('ssi', $email, $destination, $_SESSION['admin-id']);
        $result = $stmt->execute();
        
        if($result){
            
                $_SESSION['message'] = 'Admin profile updated successfully';
                $_SESSION['alert-type'] = 'success';
                header("Location: /admin/profile");
                exit;
            
        }
    }
}
adminProfileUpdate($conn);

function adminDestroy(){
    session_start();

    session_destroy();
    header("Location: /admin/login");
    $_SESSION['message'] = 'Logout successful';
    $_SESSION['alert-type'] = 'success';
}
adminDestroy();


if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
    $id = $id['4'];

    if ($uri === '/status/vendor/active/' . $id) {
        toggleActive($conn, $id);
        header("Location: /active/vendor");
        exit();
    }

    if ($uri === '/status/vendor/inactive/' . $id) {
            toggleInactive($conn, $id);
            header("Location: /inactive/vendor");
            exit();
        }

    if ($uri === '/status/customer/active/' . $id) {
        toggleActive($conn, $id);
        header("Location: /active/customer");
        exit();
    }

    if ($uri === '/status/customer/inactive/' . $id) {
        toggleInactive($conn, $id);
        header("Location: /inactive/customer");
        exit();
    }

}