<?php
session_start();
require "./database.php";


function storeCoupon($conn)
{
    if (isset($_POST['saveCoupon'])) {
        $coupon_name = $_POST['coupon_name'];
        $coupon_discount = $_POST['coupon_discount'];
        $coupon_validity = $_POST['coupon_validity'];

        $coupon_name = filter_var($coupon_name, FILTER_SANITIZE_STRING);
        $coupon_discount = filter_var($coupon_discount, FILTER_SANITIZE_STRING);
        $coupon_validity = filter_var($coupon_validity, FILTER_SANITIZE_STRING);


        $stmt = $conn->prepare("INSERT INTO coupons (coupon_name, coupon_discount, coupon_validity) VALUES(?,?,?)");
        $stmt->bind_param('sss', $coupon_name, $coupon_discount, $coupon_validity );
       $result =  $stmt->execute();
       
       if ($result) {
        $_SESSION['message'] = 'Coupon added successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/coupon");
       }else{
        $_SESSION['message'] = 'Something went Wrong';
        $_SESSION['alert-type'] = 'error';
        header("Location: /add/coupon");
       }

    }
}


function updateCoupon($conn, $id)
{

    if (isset($_POST['editCoupon'])) {
        $coupon_name = $_POST['coupon_name'];
        $coupon_discount = $_POST['coupon_discount'];
        $coupon_validity = $_POST['coupon_validity'];

        $coupon_name = filter_var($coupon_name, FILTER_SANITIZE_STRING);
        $coupon_discount = filter_var($coupon_discount, FILTER_SANITIZE_STRING);
        $coupon_validity = filter_var($coupon_validity, FILTER_SANITIZE_STRING);


        $stmt = $conn->prepare("UPDATE coupons SET  coupon_name = ?, coupon_discount = ?, coupon_validity = ? WHERE id = ?");
        $stmt->bind_param('sssi', $coupon_name, $coupon_discount, $coupon_validity, $id );
       $result =  $stmt->execute();
       
       if ($result) {
        $_SESSION['message'] = 'Coupon updated successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/coupon");
       }else{
        $_SESSION['message'] = 'Something went Wrong';
        $_SESSION['alert-type'] = 'error';
        header("Location: /add/coupon");
       }

    }
}

function deleteCoupon($conn, $id)
{
    $stmt = $conn->prepare("DELETE FROM coupons WHERE id = ? ");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['message'] = 'Coupon deleted successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/coupon");
       }else{
        $_SESSION['message'] = 'Something went Wrong';
        $_SESSION['alert-type'] = 'error';
        header("Location: /add/coupon");
       }
}


if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
    $coupon_id = array_pop($id);

    if ($uri === '/store/coupon') {
        storeCoupon($conn);
    }
    
    if ($uri === '/update/coupon/'. $coupon_id) {
    updateCoupon($conn, $coupon_id);
}

if ($uri === '/delete/coupon/'. $coupon_id) {
    deleteCoupon($conn, $coupon_id);
}
}

