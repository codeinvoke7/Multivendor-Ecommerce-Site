<?php 
session_start();
require "../database.php";
require_once "emailVerificationController.php";
use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];
    $role = $_POST['role'];
    $terms = $_POST['terms'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $phpmailer = new PHPMailer();

    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $errors = [];
    if (!empty($fullname) && !empty($email) && !empty($password)) {
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
        if (!isset($terms)) {
            $errors['terms'] = 'You must accept our terms and conditions';
        }

        $sql = $conn->query("SELECT * from users WHERE email = '$email'");
        $row = $sql->fetch_assoc();
        if ($row['email']) {
            $errors['email'] = 'User already exist. Kindly enter another email address';
        }

        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO `users` (`fullname`, `email`, `password`, `role`, `token`)VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $fullname, $email, $password, $role, $token);
           $result = $stmt->execute();

           if ($result) {
            sendVerificationCode($phpmailer, $email, $token);
            $_SESSION['reg-success'] = true;
            header("Location: /login");
            exit();
           }
        }
    }else{
        $errors['form-error'] = 'Field must not be empty';
    }

    if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST;
        $_SESSION['errors'] = $errors;
        header("Location: /registration");
        exit();
    }
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $errors = [];
    if (!empty($email) && !empty($password)) {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format";
       }

       $sql = $conn->query("SELECT * FROM users WHERE `email` = '$email'");
        $row = $sql->fetch_assoc();

        if ($row['email_verified'] == 0) {
           $_SESSION['email_not-verified'] = true;
           header("Location: /login");
           exit();
        }

        if (empty($errors)) {
           if ($row && password_verify($password, $row['password']) && $row['role'] === 'user') {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['login-success'] = true;

            header("Location: /user/dashboard");
            exit();

           }elseif ($row && password_verify($password, $row['password']) && $row['role'] === 'vendor'){
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['login-success'] = true;

            header("Location: /vendor/dashboard");
            exit();
        }else{
               $errors['invalid-fields'] = "Wrong email or password";

           }
        }
    }else{
        $errors['invalid-fields'] = 'Fields must not be empty';
    }

    if (!empty($errors)) {
        $_SESSION['login_data'] = $_POST;
        $_SESSION['errors'] = $errors;
        header("Location: /login");
    }
}//End method


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
            $_SESSION['success'] = true;

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
    }
}//End Method