
<?php
session_start();
require "./database.php";



if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
   $id = $id['4'];
    if ($uri === '/product/view/modal/'. $id) {

        // Fetch the product
        $stmt = $conn->prepare("SELECT products.*, categories.category, brands.brand_name, COALESCE(users.shop_name, 'Owner') AS shop_name  
                FROM products
                INNER JOIN categories ON products.category_id = categories.id
                INNER JOIN brands ON products.brand_id = brands.id
                LEFT JOIN users ON products.vendor_id = users.id
                WHERE products.id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $product = [
                'id' => $row['id'],
                'product_name' => $row['product_name'], 
                'selling_price' => $row['selling_price'],
                'discount_price' => $row['discount_price'],
                'category_name' => $row['category'],
                'brand_name' => $row['brand_name'],
                'vendor_shopname' => $row['shop_name'],
                'vendor_id' => $row['vendor_id'],
                'product_thumbnail' => $row['product_thumbnail'],
                'product_code' => $row['product_code'],
                'product_qty' => $row['product_qty'],
                
                
            ];
        
            $color = $row['product_color'];
            $product_color = explode(',', $color);
        
            $size = $row['product_size'];
            $product_size = explode(',', $size);
        
            $response = [
                'product' => $product,
                'color' => $product_color,
                'size' => $product_size,
            ];
        
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = [
                'error' => 'Product not found'
            ];
        
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
    }
}