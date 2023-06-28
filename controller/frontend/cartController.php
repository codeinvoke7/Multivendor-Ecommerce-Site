<?php
session_start();
require "./database.php";

// session_destroy();
// session_abort();
function addToCart($conn, $id){
    if (!empty($_SESSION['coupon'])) {
        unset($_SESSION['coupon']);
    }

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Create the cart item array
$cartItem = [
    'rowId' => uniqid(),
    'id' => $id,
    'name' => $product['product_name'],
    'qty' => $_POST['quantity'],
    'weight' => 1,
    'options' => [
        'image' => $product['product_thumbnail'],
        'color' => $_POST['color'],
        'size' => $_POST['size'],
        'vendor' => $_POST['vendor'],
        'vendor_id' => $_POST['vendor_id'],
    ],
];

// Set the price based on whether a discount is available or not
if ($product['discount_price'] == NULL) {
    $cartItem['price'] = $product['selling_price'];
} else {
    $cartItem['price'] = $product['discount_price'];
}
$cartItem['subtotal'] = $cartItem['price'] * $cartItem['qty'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$_SESSION['cart'][] = $cartItem;

$response = array('success' => 'Successfully Added to Your Cart');
echo json_encode($response);

}

function addToCartDetails($conn, $id){

    if (!empty($_SESSION['coupon'])) {
        unset($_SESSION['coupon']);
    }
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Create the cart item array
$cartItem = [
    'rowId' => uniqid(),
    'id' => $id,
    'name' => $product['product_name'],
    'qty' => $_POST['quantity'],
    'weight' => 1,
    'options' => [
        'image' => $product['product_thumbnail'],
        'color' => $_POST['color'],
        'size' => $_POST['size'],
        'vendor_id' => $_POST['vendor'],
    ],
];

// Set the price based on whether a discount is available or not
if ($product['discount_price'] == NULL) {
    $cartItem['price'] = $product['selling_price'];
} else {
    $cartItem['price'] = $product['discount_price'];
}
$cartItem['subtotal'] = $cartItem['price'] * $cartItem['qty'];


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$_SESSION['cart'][] = $cartItem;

$response = array('success' => 'Successfully Added to Your Cart');
echo json_encode($response);

}


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

function addMiniCart()
{

// Retrieve the cart items from the session
$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$cartQty = count($carts);
$cartTotal = calculateCartTotal($carts); 

$response = array(
    'carts' => $carts,
    'cartQty' => $cartQty,
    'cartTotal' => $cartTotal
);
echo json_encode($response);

}

function getCartProduct()
{

// Retrieve the cart items from the session
$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$cartQty = count($carts);
$cartTotal = calculateCartTotal($carts); 

$response = array(
    'carts' => $carts,
    'cartQty' => $cartQty,
    'cartTotal' => $cartTotal
);
echo json_encode($response);

}

function removeMiniCart($rowId) {
    $productFound = false;

    foreach ($_SESSION['cart'] as $index => $product) {
        if ($product['rowId'] === $rowId) {
            unset($_SESSION['cart'][$index]);
            $productFound = true;
            break;
        }
    }

    if ($productFound) {
        $response = array('success' => 'Product Removed From Cart');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Product not found in Cart');
        echo json_encode($response);
    }
}
function cartRemove($conn, $rowId)
{
    $productFound = false;
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    foreach ($carts as $index => $product) {
        if ($product['rowId'] === $rowId) {
            unset($_SESSION['cart'][$index]);
            $productFound = true;
            break;
        }
    }

    $carts = $_SESSION['cart'];
    // Check if the cart is empty and unset the coupon session
    if (empty($_SESSION['cart'])) {
        unset($_SESSION['coupon']);
    }
    updateCouponDiscount($conn, $carts);

    if ($productFound) {
        $response = array('success' => 'Product Removed From Cart');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Product not found in Cart');
        echo json_encode($response);
    }
}

function updateCouponDiscount($conn, $carts)
{
    if (!empty($_SESSION['coupon'])) {
        $cartTotal = calculateCartTotal($carts);
        $coupon_name = $_SESSION['coupon']['coupon_name'];

        $stmt = $conn->prepare("SELECT * FROM coupons WHERE coupon_name = ?");
        $stmt->bind_param('s', $coupon_name);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
            $_SESSION['coupon']['discount_amount'] = round($cartTotal * $result['coupon_discount'] / 100);
            $_SESSION['coupon']['total_amount'] = round($cartTotal - $_SESSION['coupon']['discount_amount']);
        } else {
            // Handle coupon not found error
        }
    }
}
function cartDecrement($conn, $rowId) {
    // Retrieve the cart data from the session or database
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    foreach ($carts as $key => $item) {

        if ($item['rowId'] === $rowId) {
            if ($carts[$key]['qty'] > 1) {
            $carts[$key]['qty']--;
            $carts[$key]['subtotal'] = $carts[$key]['price'] * $carts[$key]['qty'];

            // Update the cart data in the session or database
            $_SESSION['cart'] = $carts;

            updateCouponDiscount($conn, $carts);
            // Return a JSON response
            echo json_encode('Decrement');
            return;
        }
    }
    }


    echo json_encode('Item not found');
}
// End Method
function cartIncrement($conn, $rowId) {
    // Retrieve the cart data from the session or database
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    foreach ($carts as $key => $item) {
        
        if ($item['rowId'] === $rowId) {
            $carts[$key]['qty']++;
            $carts[$key]['subtotal'] = $carts[$key]['price'] * $carts[$key]['qty'];

            // Update the cart data in the session or database
            $_SESSION['cart'] = $carts;

            updateCouponDiscount($conn, $carts);
            echo json_encode('Increment');
            return;
        }
    }

    echo json_encode('Item not found');
}


 function couponApply($conn)
 {
    $coupon_name = $_POST['coupon_name'];
    $currentDate = date('Y-m-d');
    $stmt = $conn->prepare("SELECT * FROM coupons WHERE coupon_name = ? AND coupon_validity >=  ? ");
    $stmt->bind_param('ss', $coupon_name, $currentDate);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();


  if ($result) {
        $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        $cartQty = count($carts);
        $cartTotal = calculateCartTotal($carts);
       $_SESSION['coupon'] = [
            'coupon_name' => $result['coupon_name'],
            'coupon_discount' => $result['coupon_discount'],
            'discount_amount' => round($cartTotal * $result['coupon_discount']/100),
            'total_amount' => round($cartTotal - $cartTotal * $result['coupon_discount']/100)
       ];

       $response = array(
        'validity' => true,
       'success' => 'Coupon Applied Successfully'
    );
       echo json_encode($response);
    }else{
        $response = array('error' => 'Invalid Coupon');
        echo json_encode($response);
    }
}

function  couponCalculation()
{
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    $cartQty = count($carts);
    $cartTotal = calculateCartTotal($carts);

    if (!empty($_SESSION['coupon'])) {
      
        $response = array(
            'subtotal' => $cartTotal,
            'coupon_name' => $_SESSION['coupon']['coupon_name'],
            'coupon_discount' => $_SESSION['coupon']['coupon_discount'],
            'discount_amount' => $_SESSION['coupon']['discount_amount'],
            'total_amount' => $_SESSION['coupon']['total_amount']
        );
        
 

        echo json_encode($response);
    } else {
        $response = array(
            'total' => $cartTotal
        );
        echo json_encode($response);
    }
}

function couponRemove(){

    unset($_SESSION['coupon']);
   $response = (['success' => 'Coupon Removed Successfully']);
   echo json_encode($response);
}// End Method

function checkout()
{
    $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $cartQty = count($carts);
    $cartTotal = calculateCartTotal($carts); 

    if (isset($_SESSION['vendor_id']) || isset($_SESSION['admin-id'])) {
        $_SESSION['message'] = 'Please Login With A User Account';
            $_SESSION['alert-type'] = 'error';
            header("Location: /mycart");
            exit();
    }
    if (isset($_SESSION['user_id'])) {
        if ($cartTotal > 0) {

            
            
            $response = array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal
            );
           
            // echo json_encode($response);
            include 'views/frontend/checkout/checkout_view.php';
            
            exit();
        }else{
             $_SESSION['message'] = 'Shop At Least One Product';
            $_SESSION['alert-type'] = 'error';
            header("Location: /");
            exit();
        }
    }else{
        $_SESSION['message'] = 'You Need to Login First';
       $_SESSION['alert-type'] = 'error';
       header("Location: /login");
       exit();
   }
}

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
    $id = array_pop($id);

    if ($uri === '/cart/data/store/' . $id) {
        addToCart($conn, $id);
        exit();
    }

    if ($uri === '/dcart/data/store/' . $id) {
        addToCartDetails($conn, $id);
        exit();
    }

    if ($uri === '/product/mini/cart') {
        addMiniCart();
        exit();
    }

   if ($uri === '/minicart/product/remove/' . $id) {
    removeMiniCart($id);
    exit();
}


if ($uri === '/get-cart-product') {
   getCartProduct();
    exit();
}

if ($uri === '/cart/remove/' . $id) {
    cartRemove($conn, $id);
     exit();
 }
 
if ($uri === '/cart/decrement/' . $id) {
    cartDecrement($conn, $id);
     exit();
 }
 
 if ($uri === '/cart/increment/' . $id) {
    cartIncrement($conn, $id);
     exit();
 }
 
 if ($uri === '/coupon-apply') {
    couponApply($conn);
     exit();
 }
 
if ($uri === '/coupon-calculation') {
    couponCalculation();
     exit();
 }

 if ($uri === '/coupon-remove') {
    couponRemove();
     exit();
 }

 if ($uri === '/checkout') {
    checkout();
    exit();
 }

}






