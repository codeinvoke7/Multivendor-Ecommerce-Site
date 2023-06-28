<?php
session_start();
require "./database.php";
require_once "mail/orderMail.php";
use PHPMailer\PHPMailer\PHPMailer;
$phpmailer = new PHPMailer();

$curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/". $_GET['reference'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_57f975015bea0c6cc82150ce78f77f428a03c01d",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    $_SESSION['message'] = "cURL Error #:" . $err;
    $_SESSION['alert-type'] = 'error';
    header("Location: /mycart");
    exit();
  } else {
    $paymentData =json_decode($response, true);
  }

  $userId = $_SESSION['user_id'];
  $amount = $paymentData['data']['amount']  / 100;
  $name = $paymentData['data']['metadata']['name'];
  $email = $paymentData['data']['customer']['email'];
  $phone = $paymentData['data']['metadata']['phone'];
  $country = $paymentData['data']['metadata']['country'];
  $state = $paymentData['data']['metadata']['state'];
  $city = $paymentData['data']['metadata']['city'];
  $address = $paymentData['data']['metadata']['address'];
  $notes = $paymentData['data']['metadata']['notes'];
  $currency = $paymentData['data']['currency'];
  $paymentType = $paymentData['data']['channel'];
  $paymentMethod = 'Paystack';
  $transactionId = $paymentData['data']['reference'];
  $trans_status = $paymentData['data']['status'];
 $orderNumber = $paymentData['data']['id'];
 $invoiceNumber = 'EOS'.mt_rand(10000000,99999999);
 $orderDate = date('d F Y');
 $status = 'pending';
  
    if ($trans_status == 'success') {


        $stmt = mysqli_prepare($conn, "INSERT INTO orders (user_id, country, `state`, city, `name`, email, phone, `address`, notes, payment_type, payment_method, transaction_id, currency, amount, order_no, invoice_no, order_date, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "issssssssssssdssss", $userId, $country, $state, $city, $name, $email, $phone, $address, $notes, $paymentType, $paymentMethod, $transactionId, $currency, $amount, $orderNumber, $invoiceNumber, $orderDate, $status);
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

