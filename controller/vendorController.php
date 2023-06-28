<?php 
session_start();
require "./database.php";
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

        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO `users` (`fullname`, `email`, `phone`, `password`, `role`, `shop_name`, `country`, `state`, `city`, `address`, `token`)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssss", $fullname, $email, $phone, $password, $role, $shopname, $country, $state, $city, $address, $token);
           $result = $stmt->execute();

           if ($result) {
            sendVerificationCode($phpmailer, $email, $token);
            $_SESSION['message'] = 'Your registration was successfull. A verification email has been sent to you';
            $_SESSION['alert-type'] = 'success';
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

function vendorProfileUpdate($conn)
{
    $old_photo = '';
    $stmt = $conn->prepare("SELECT photo FROM `users` WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['vendor_id']); // Assuming the id is an integer, change the "s" to "i"
    $stmt->execute();
    $stmt->bind_result($old_photo);
    $stmt->fetch();
    $stmt->close();

    if (isset($_POST['vendorProfileUpdate'])) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $shopname = $_POST['shopname'];
        $address = $_POST['address'];
        $vendor_bio = $_POST['vendor_short_info'];

        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $shopname = filter_var($shopname, FILTER_SANITIZE_STRING);
        $address = filter_var($address, FILTER_SANITIZE_STRING);
        $vendor_bio = filter_var($vendor_bio, FILTER_SANITIZE_STRING);

        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $destination = "./views/public/uploads/vendor_images/" . $photo;


           

            $sql = $conn->query("SELECT * from users WHERE email = '$email' OR `shop_name` = '$shopname' OR `phone` = '$phone'");
        $row = $sql->fetch_assoc();
        if ($sql->num_rows > 0) {
            $existingEmail = $row['email'];
            $existingShopname = $row['shop_name'];
            $existingPhone = $row['phone'];

            if ($email !== $_SESSION['email'] && $email === $existingEmail) {
                $errors['email'] = 'User already exists. Please enter another email address.';
            }
            if ($shopname !== $_SESSION['shopname'] && $shopname === $existingShopname) {
                $errors['shopname'] = 'Shop already exists. Please enter another shop name.';
            }
            if ($phone !== $_SESSION['phone'] && $phone === $existingPhone) {
                $errors['phone'] = 'Phone number already exists. Please enter another number.';
            }
        }

        $old_photo = '';
    $stmt = $conn->prepare("SELECT photo FROM `users` WHERE id = ?");
    $stmt->bind_param("s", $_SESSION['vendor_id']);
    $stmt->execute();
    $stmt->bind_result($old_photo);
    $stmt->fetch();
    $stmt->close();

        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        move_uploaded_file($tmp, $destination);
                        if (!empty($old_photo) && file_exists($old_photo)) {
                            unlink($old_photo);
                        }
                    } else {
                        $destination = $old_photo;
                    }

        if (empty($errors)) {

            $stmt = $conn->prepare("UPDATE `users` SET `email` = ?, `phone` = ?, photo = ?, `shop_name` = ?,  `address` = ?, `vendor_bio` = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $email, $phone, $destination, $shopname,  $address, $vendor_bio, $_SESSION['vendor_id']);
            $result = $stmt->execute();

            if ($result) {
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['shop_name'] = $shopname;

                $_SESSION['message'] = 'Vendor profile updated successfully';
                $_SESSION['alert-type'] = 'success';
                header("Location: /vendor/profile");
                exit;
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: /vendor/profile");
            exit();
        }
    }
}

vendorProfileUpdate($conn);


function vendorDestroy(){
    session_start();

    session_destroy();
    header("Location: /login");
    $_SESSION['message'] = 'Logout successful';
    $_SESSION['alert-type'] = 'success';
}
vendorDestroy();

