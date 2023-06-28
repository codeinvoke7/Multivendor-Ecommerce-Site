<?php
    require_once './vendore/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;


function sendVerificationCode($phpmailer, $user_email, $token) {
    // global $phpmailer;

    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost:8000/verify_email?token=' . $token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '6cc21536b88b52';
    $phpmailer->Password = 'd0be386b4c33b4';

    $phpmailer->setFrom('revest@gmail.com', 'Revest');
    $phpmailer->addAddress($user_email); // The user's email address and name
    $phpmailer->isHTML(true);
    $phpmailer->Subject = 'Confirm your account';
    $phpmailer->Body = $body;
    $phpmailer->addCustomHeader('Content-Type: text/html'); // Set the Content-Type header to HTML

    // Send the message
    if (!$phpmailer->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}


