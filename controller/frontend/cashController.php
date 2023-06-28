<?php
session_start();
require "./database.php";
require_once "mail/orderMail.php";
use PHPMailer\PHPMailer\PHPMailer;
$phpmailer = new PHPMailer();

if (isset($_POST['cashPayment'])) {

  $userId = $_SESSION['user_id'];
  $amount = $_POST['amount'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $notes = $_POST['notes'];
  $currency = 'NGN';
  $paymentType = 'Cash on delivery';
  $paymentMethod = 'Cash on delivery';
  $invoiceNumber = 'EOS'.mt_rand(10000000,99999999);
  $orderDate = date('d F Y');
  $status = 'pending';
  
  

        $stmt = mysqli_prepare($conn, "INSERT INTO orders (user_id, country, `state`, city, `name`, email, phone, `address`, notes, payment_type, payment_method, currency, amount, invoice_no, order_date, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "issssssssssssdss", $userId, $country, $state, $city, $name, $email, $phone, $address, $notes, $paymentType, $paymentMethod, $currency, $amount, $invoiceNumber, $orderDate, $status);
        $result = mysqli_stmt_execute($stmt);
      if ($result) {
       
        $orderId = mysqli_insert_id($conn);

        $result = mysqli_query($conn, "SELECT * FROM orders WHERE id = $orderId");
        $invoice = mysqli_fetch_assoc($result);

        $order = [

            'invoice_no' => $invoice['invoice_no'],
            'amount' => $invoice['amount'],
            'name' => $invoice['name'],
            'email' => $invoice['email'],
            'phone' => $invoice['phone'],
            'state' => $invoice['state'],
            'city' => $invoice['city'],
            'address' => $invoice['address'],

        ];

        mysqli_stmt_close($stmt);
        // send order mail
        sendOrderMail($phpmailer, $order);
  }
        $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $stmtOrder = $conn->prepare("INSERT INTO order_item (order_id, product_id, vendor_id, color, size, qty, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        foreach ($carts as $cart) {
           $vendor_id =  $cart['options']['vendor_id'] != '' ? $cart['options']['vendor_id'] : null;
            $stmtOrder->bind_param('sssssss', $orderId, $cart['id'], $vendor_id, $cart['options']['color'], $cart['options']['size'], $cart['qty'], $cart['price']);
            $stmtOrder->execute();
        }
        
        $stmtOrder->close();
            

        if (!empty($_SESSION['coupon'])) {
            unset($_SESSION['coupon']);
        }

            unset($_SESSION['cart']);
            $_SESSION['message'] = 'Your Order Was Placed Successfully';
            $_SESSION['alert-type'] = 'success';
            header("Location: /user/dashboard");
            exit();
        }

