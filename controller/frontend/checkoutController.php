<?php
session_start();

function calculateCartTotal($carts) {
    $total = 0;

    foreach ($carts as $cartItem) {
        $price = $cartItem['price'];
        $quantity = $cartItem['qty'];

        $subtotal = $price * $quantity;
        $total += $subtotal;
    }

    return $total;
}
function checkoutStore($request){
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    

    $data = array();
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone']; 

        $data['country'] = $request['country'];
        $data['state'] = $request['state'];
        $data['city'] = $request['city'];
        $data['address'] = $request['address'];
        $data['notes'] = $request['notes']; 
         $cartTotal = calculateCartTotal($carts);

        if ($request['payment_method'] == 'paystack') {
           include('views/frontend/payment/paystack.php');
        }elseif ($request['payment_method'] == 'card'){
            return 'Card Page';
        }else{
            include('views/frontend/payment/cash.php');
        }
}

checkoutStore($_POST);