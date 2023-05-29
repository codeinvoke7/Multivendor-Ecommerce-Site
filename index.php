<?php
$viewDir = 'views';
// Define your routing rules
$routes = [
    '/' => "$viewDir/frontend/home.php",
    
    // customer route
    '/login' => "$viewDir/users/customers/login.php",
    '/reset_password' => "$viewDir/users/customers/forgetPassword.php",
    '/registration' => "$viewDir/users/customers/registration.php",
    '/verify_email' => "controller/confirmEmail.php",
    '/user/dashboard' => "$viewDir/users/customers/dashboard.php",
    '/logout' => "controller/logoutController.php",

    // vendor route
    '/vendor/sign-up' => "$viewDir/users/vendors/registration.php",
    '/vendor/dashboard' => "$viewDir/users/vendors/dashboard.php",
    '/vendor/orders' => "$viewDir/users/vendors/orders.php",
    '/vendor/all/products' => "$viewDir/users/vendors/allProducts.php",
    '/vendor/withdrawals' => "$viewDir/users/vendors/withdrawals.php",
    
    
    // admin route
    '/admin/login' => "$viewDir/users/admin/login.php",
    '/admin/dashboard' => "$viewDir/users/admin/dashboard.php",
    '/admin/all/products' => "$viewDir/users/admin/allProducts.php",
    '/admin/add/product' => "$viewDir/users/admin/addProducts.php",
    '/admin/orders' => "$viewDir/users/admin/orders.php",
    '/admin/all/brands' => "$viewDir/users/admin/allBrands.php",
    '/admin/add/brands' => "$viewDir/users/admin/addBrand.php",
    '/admin/all/categories' => "$viewDir/users/admin/allCategories.php",
    '/admin/add/category' => "$viewDir/users/admin/addCategory.php",
    '/admin/all/sub-categories' => "$viewDir/users/admin/allSub-categories.php",
    '/admin/add/sub-category' => "$viewDir/users/admin/addSub-category.php",
    

    // payment
    '/verify-transaction' => "controller/verifyTransactionController.php",
    
   
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
