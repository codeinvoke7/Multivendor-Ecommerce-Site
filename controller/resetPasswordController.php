<?php
require "../database.php";


if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    $errors = [];
    if (!empty($email) && !empty($password) && !empty($confirm_pass)) {
        if (strlen($password) < 8) {
            $errors['password'] = 'Password must not be less than 8 characters';
        }elseif ($confirm_pass !== $password) {
            $errors['confirmpass'] = 'Password must match';
        }else{
           $password =  password_hash($password, PASSWORD_DEFAULT);
        }


        if (empty($errors)) {

        $sql = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($sql->num_rows > 0) {
            $sql = $conn->query("UPDATE `users` SET `password` = '$password' WHERE `email` = '$email'");

            if ($sql) {
                $_SESSION['pass_reset'] = true;
                header("Location: /login");
                exit();
            }
        }else {
            $errors['email'] = "Email address not found";
        }
     }
    }else{
        $errors['invalid-fields'] = 'Kindly fill all fields';
    }

    if (!empty($errors)) {
       $_SESSION['form_data'] = $_POST;
       $_SESSION['errors'] = $errors;
       header("Location: /reset_password");
       exit();
    }
}