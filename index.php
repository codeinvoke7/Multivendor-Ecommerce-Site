<?php
$viewDir = 'views';
use controller\categoryController;
// Define your routing rules
$routes = [
    '/' => "$viewDir/frontend/home.php",
    '/auth' => "controller/authController.php",
    
    
    // customer route
    '/login' => "$viewDir/users/customers/login.php",
    '/reset_password' => "$viewDir/users/customers/forgetPassword.php",
    '/registration' => "$viewDir/users/customers/registration.php",
    '/verify_email' => "controller/confirmEmail.php",
    '/user/dashboard' => "$viewDir/users/customers/dashboard.php",
    '/user/order' => "$viewDir/users/customers/order/orders.php",
    '/logout' => "controller/logoutController.php",

    // vendor route
    '/vendor/sign-up' => "$viewDir/users/vendors/registration.php",
    '/vendor/auth' => "controller/vendorController.php",
    '/vendor/dashboard' => "$viewDir/users/vendors/dashboard.php",
    '/vendor/order' => "$viewDir/users/vendors/orders/orders.php",
    '/vendor/profile' => "$viewDir/users/vendors/vendor_profile.php",
    '/vendor/profile/store' => "controller/VendorController.php", 
    '/vendor/logout' => "controller/vendorController.php",

    // vendor product add
    '/vendor/all/products' => "$viewDir/users/vendors/product/vendor_all_products.php",
    '/vendor/add/product' => "$viewDir/users/vendors/product/vendor_add_product.php",
    '/vendor/subcategory/ajax/:id' =>  "controller/vendorProductController.php",
    '/vendor/product/store' =>  "controller/vendorProductController.php",
    '/vendor/edit/product/:id' => "$viewDir/users/vendors/product/vendor_edit_product.php",
    '/vendor/update/product/:id' => "controller/vendorProductController.php",
    '/vendor/update/product/thumbnail/:id' => "controller/vendorProductController.php",
    '/vendor/update/product/images/:id' => "controller/vendorProductController.php",
    '/vendor/product/multiimage/delete/:id' => "controller/vendorProductController.php",
    '/vendor/status/product/:id' => "controller/vendorProductController.php",
    '/vendor/delete/product/:id' => "controller/vendorProductController.php",
    '/vendor/withdrawals' => "$viewDir/users/vendors/withdrawals.php",
   

    
    
    // admin route
    '/admin/login' => "$viewDir/users/admin/login.php",
    '/admin/dashboard' => "$viewDir/users/admin/dashboard.php",
    '/admin/auth' => "controller/adminController.php",
    '/admin/profile' => "$viewDir/users/admin/admin_profile.php",
    '/admin/profile/store' => "controller/adminController.php",
    '/admin/logout' => "controller/adminController.php",

    '/active/customer' => "$viewDir/users/admin/customer/active_customer.php",
    '/inactive/customer' => "$viewDir/users/admin/customer/inactive_customer.php",
    
    '/active/customer/details/:id' => "$viewDir/users/admin/customer/active_customer_details.php",
    '/inactive/customer/details/:id' => "$viewDir/users/admin/customer/inactive_customer_details.php",
    '/status/customer/active/:id' => "controller/adminController.php",
    '/status/customer/inactive/:id' => "controller/adminController.php",

    '/active/vendor' => "$viewDir/users/admin/vendor/active_vendor.php",
    '/inactive/vendor' => "$viewDir/users/admin/vendor/inactive_vendor.php",
    '/active/vendor/details/:id' => "$viewDir/users/admin/vendor/active_vendor_details.php",
    '/inactive/vendor/details/:id' => "$viewDir/users/admin/vendor/inactive_vendor_details.php",
    '/status/vendor/active/:id' => "controller/adminController.php",
    '/status/vendor/inactive/:id' => "controller/adminController.php",

    // admin add products route
    '/admin/all/products' => "$viewDir/users/admin/product/all_products.php",
    '/admin/add/product' => "$viewDir/users/admin/product/add_product.php",
    '/product/store' => "controller/productController.php",
    '/edit/product/:id' => "$viewDir/users/admin/product/edit_product.php",
    '/update/product/:id' => "controller/productController.php",
    '/update/product/thumbnail/:id' => "controller/productController.php",
    '/update/product/images/:id' => "controller/productController.php",
    '/status/product/:id' => "controller/productController.php",
    '/delete/product/:id' => "controller/productController.php",

    // orders
    '/pending/order' => "$viewDir/users/admin/orders/pending_orders.php",

    // brands
    '/all/brands' => "$viewDir/users/admin/brand/all_brands.php",
    '/add/brand' => "$viewDir/users/admin/brand/add_brand.php",
    '/brand/store' => "controller/brandController.php",
    '/edit/brand/:id' => "$viewDir/users/admin/brand/edit_brand.php",
    '/update/brand/:id' => "controller/brandController.php",
    '/status/brand/:id' => "controller/brandController.php",
    '/delete/brand/:id' => "controller/brandController.php",



    // category
    '/all/categories' => "$viewDir/users/admin/category/all_categories.php",
    '/add/category' => "$viewDir/users/admin/category/add_category.php",
    '/category/store' => "controller/categoryController.php",
    '/edit/category/:id' => "$viewDir/users/admin/category/edit_category.php",
    '/update/category/:id' => "controller/categoryController.php",
    '/status/category/:id' => "controller/categoryController.php",
    '/delete/category/:id' => "controller/categoryController.php",

    // subcategory
    '/all/subcategories' => "$viewDir/users/admin/subcategory/all_subcategories.php",
    '/add/subcategory' => "$viewDir/users/admin/subcategory/add_subcategory.php",
    '/subcategory/store' => "controller/subcategoryController.php",
    '/edit/subcategory/:id' => "$viewDir/users/admin/subcategory/edit_subcategory.php",
    '/update/subcategory/:id' => "controller/subcategoryController.php",
    '/status/subcategory/:id' => "controller/subcategoryController.php",
    '/delete/subcategory/:id' => "controller/subcategoryController.php",
    '/subcategory/ajax/:id' =>  "controller/subcategoryController.php",

    // coupon route
    '/all/coupon' => "$viewDir/users/admin/coupon/all_coupon.php",
    '/add/coupon' => "$viewDir/users/admin/coupon/add_coupon.php",
    '/store/coupon' => "controller/couponController.php",
    '/edit/coupon/:id' => "$viewDir/users/admin/coupon/edit_coupon.php",
    '/update/coupon/:id' => "controller/couponController.php",
    '/delete/coupon/:id' => "controller/couponController.php",


    // product view modal //
    '/product/view/modal/:id' => "controller/frontend/indexController.php",
    '/product/details/:id/:slug' => "$viewDir/frontend/product/product_details.php",

    // addtocart
    '/cart/data/store/:id' => "controller/frontend/cartController.php",
    '/product/mini/cart' => "controller/frontend/cartController.php",
    '/dcart/data/store/:id' => "controller/frontend/cartController.php",
    '/hcart/data/store/:id' => "controller/frontend/cartController.php",
    '/minicart/product/remove/:id' => "controller/frontend/cartController.php",
    '/mycart' => "$viewDir/frontend/mycart/cart.php",
    '/get-cart-product' => "controller/frontend/cartController.php",
    '/cart/remove/:id' => "controller/frontend/cartController.php",
    '/cart/increment/:id' => "controller/frontend/cartController.php",
    '/cart/decrement/:id' => "controller/frontend/cartController.php",
    '/coupon-apply' => "controller/frontend/cartController.php",
    '/coupon-calculation' => "controller/frontend/cartController.php",
    '/coupon-remove' => "controller/frontend/cartController.php",

    // checkout
    '/checkout' => "controller/frontend/cartController.php",
    '/checkout/store' => "controller/frontend/checkoutController.php",

    // payment
    '/paystack/order' => "controller/frontend/paystackController.php",
    '/cash/order' => "controller/frontend/cashController.php",
    
   
    '/404' => "$viewDir/404.php",
];

// Parse the requested URL
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
foreach ($routes as $route => $file) {
    // Replace any variables in the route
    $route = preg_replace('/:[^\/]+/', '([^\/]+)', $route);

    // Match the route to the URL
    if (preg_match('#^' . $route . '$#', $url, $matches)) {
        // Extract any variables from the URL
        $vars = array();
        preg_match_all('/:[^\/]+/', $route, $var_names);
        foreach ($var_names[0] as $var_name) {
            $vars[substr($var_name, 1)] = $matches[array_search($var_name, $var_names[0]) + 1];
        }

        // Route the request to the appropriate script
        require $file;
        exit;
    }
}

// If no route was matched, return a 404 error
header('HTTP/1.1 404 Not Found');
echo '404 Not Found';
