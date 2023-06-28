<?php
    require_once './vendore/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;


function sendOrderMail($phpmailer, $order) {
    // global $phpmailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
      <title>Email Invoice</title>
      <style>
        /* Add custom styles here */
      </style>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="mt-4">Invoice</h1>
            <div class="text-end">
            <span class="h5">Invoice no:</span>
            <span class="fw-bold">'. $order['invoice_no'] .'</span>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <h5>From:</h5>
                <address>
                  Your Company Name<br>
                  Your Address<br>
                  City, State, ZIP<br>
                  Phone: 123-456-7890<br>
                  Email: info@example.com
                </address>
              </div>
              <div class="col-md-6 text-md-end">
                <h5>To:</h5>
                <address>
                 '. $order['name'] .'<br>
                 '. $order['address'] .'<br>
                 '. $order['city'] .','. $order['state'].'<br>
                  Phone: '. $order['phone'] .'<br>
                  Email: '. $order['email'] .'
                </address>
              </div>
            </div>
            <div>
            <span class="h5">Amount: </span class="fw-bold"><span>₦'. $order['amount'] .'</span>
            </div>
            <div class="mt-4">
              <p>If you have any questions, feel free to contact us. Thank you for your business!</p>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
    ';

    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '6cc21536b88b52';
    $phpmailer->Password = 'd0be386b4c33b4';

    $phpmailer->setFrom('support@gmail.com', 'M-vendor');
    $phpmailer->addAddress($order['email']); // The user's email address and name
    $phpmailer->isHTML(true);
    $phpmailer->Subject = 'Order Invoice';
    $phpmailer->Body = $body;
    $phpmailer->addCustomHeader('Content-Type: text/html'); // Set the Content-Type header to HTML
    // Send the message
    $phpmailer->send();
}


