<?php 

require "../database.php";
require_once "emailVerificationController.php";
use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['vendor_signup'])) {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $shopname = $_POST['shopname'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];
    $role = $_POST['role'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $phpmailer = new PHPMailer();

    $name = filter_var($fullname, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $shopname = filter_var($shopname, FILTER_SANITIZE_STRING);
    $country = filter_var($country, FILTER_SANITIZE_STRING);
    $state = filter_var($state, FILTER_SANITIZE_STRING);
    $city = filter_var($city, FILTER_SANITIZE_STRING);
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $errors = [];
    if (!empty($fullname) && !empty($email) && !empty($phone) && !empty($password) && !empty($shopname) && !empty($country) && !empty($state) && !empty($city) && !empty($address)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors['email'] = 'Kindly enter a valid email address';
        }
        // if ($confirmpass !== $password) {
        //     $errors['confirmpass'] = 'Password must match';
        // }
        if (strlen($password) < 8) {
            $errors['password'] = "Password must be at least 8 characters";
        }elseif($confirmpass !== $password){
            $errors['confirmpass'] = 'Password must match';
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);

        }

        $sql = $conn->query("SELECT * from users WHERE email = '$email' OR `shop_name` = '$shopname' OR `phone` = '$phone'");
        $row = $sql->fetch_assoc();
        if ($sql->num_rows > 0) {
            $errors['email'] = 'User already exist. Kindly enter another email address';
            $errors['shopname'] = 'Shop already exist. Kindly enter another shop name';
            $errors['phone'] = 'Phone number already exist. Kindly enter another number';
        }
        // if ($row['email']) {
        //     $errors['email'] = 'User already exist. Kindly enter another email address';
        // }
        // if ($row['shop_name']) {
        //     $errors['shopname'] = 'Shop already exist. Kindly enter another shop name';
        // }
        // if ($row['phone']) {
        //     $errors['phone'] = 'Phone number already exist. Kindly enter another number';
        // }

        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO `users` (`fullname`, `email`, `phone`, `password`, `role`, `shop_name`, `country`, `state`, `city`, `address`, `token`)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $fullname, $email, $phone, $password, $role, $shopname, $country, $state, $city, $address, $token);
           $result = $stmt->execute();

           if ($result) {
            sendVerificationCode($phpmailer, $email, $token);
            $_SESSION['reg-success'] = true;
            header("Location: /login");
            exit();
           }
        }
    }else{
        $errors['form-error'] = 'Fields must not be empty';
    }

    if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST;
        $_SESSION['errors'] = $errors;
        header("Location: /vendor/sign-up");
        exit();
    }
}