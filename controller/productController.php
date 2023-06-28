<?php
session_start();
require "./database.php";

if (isset($_POST['save'])) {
    // Retrieve form values
    $product_name = $_POST['product_name'];
    $product_slug = strtolower(str_replace(' ', '-', $product_name));
    $product_tags = $_POST['product_tags'];
    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    $short_descp = $_POST['short_descp'];
    $long_descp = $_POST['long_descp'];
    $selling_price = $_POST['selling_price'];
    $discount_price = $_POST['discount_price'];
    $product_code = $_POST['product_code'];
    $product_qty = $_POST['product_qty'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];
    $vendor_id = isset($_POST['vendor_id']) && $_POST['vendor_id'] != '' ? $_POST['vendor_id'] : null;
    $hot_deals = isset($_POST['hot_deals']) ? $_POST['hot_deals'] : 0;
    $featured = isset($_POST['featured']) ? $_POST['featured'] : 0;
    $special_offer = isset($_POST['special_offer']) ? $_POST['special_offer'] : 0;
    $special_deals = isset($_POST['special_deals']) ? $_POST['special_deals'] : 0;

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_slug, product_tags, product_size, product_color, short_descp, long_descp, selling_price, discount_price, product_code, product_qty, brand_id, category_id, subcategory_id, vendor_id, hot_deals, featured, special_offer, special_deals) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssss", $product_name, $product_slug, $product_tags, $product_size, $product_color, $short_descp, $long_descp, $selling_price, $discount_price, $product_code, $product_qty, $brand_id, $category_id, $subcategory_id, $vendor_id, $hot_deals, $featured, $special_offer, $special_deals);
    
    if ($stmt->execute()) {
        $product_id = $conn->insert_id;

        // Handle main thumbnail upload
        if ($_FILES['product_thumbnail']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['product_thumbnail']['tmp_name'];
            $filename = $_FILES['product_thumbnail']['name'];
            $destination = "./views/public/uploads/product/thumbnails/" . $filename;
            move_uploaded_file($tmp_name, $destination);

            // Update the product record with the main thumbnail path
            $stmt = $conn->prepare("UPDATE products SET product_thumbnail = ? WHERE id = ?");
            $stmt->bind_param("si", $destination, $product_id);
            $stmt->execute();
            $stmt->close();
        }

        if (!empty($_FILES['multi_img']['name'][0])) {
            $file_count = count($_FILES['multi_img']['name']);
            for ($i = 0; $i < $file_count; $i++) {
                if ($_FILES['multi_img']['error'][$i] === UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES['multi_img']['tmp_name'][$i];
                    $filename = $_FILES['multi_img']['name'][$i];
                    $destination = "./views/public/uploads/product/product_images/" . $filename;
                    move_uploaded_file($tmp_name, $destination);
        
                    // Insert the image path into the database
                    $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
                    $stmt->bind_param("is", $product_id, $destination);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
        $_SESSION['message'] = 'Product added successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /admin/all/products");
    exit();
        
}
}


function updateProduct($conn, $product_id)
{


    if (isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_slug = strtolower(str_replace(' ', '-', $product_name));
    $product_tags = $_POST['product_tags'];
    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    $short_descp = $_POST['short_descp'];
    $long_descp = $_POST['long_descp'];
    $selling_price = $_POST['selling_price'];
    $discount_price = $_POST['discount_price'];
    $product_code = $_POST['product_code'];
    $product_qty = $_POST['product_qty'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];
    $vendor_id = $_POST['vendor_id'];
    $hot_deals = isset($_POST['hot_deals']) ? $_POST['hot_deals'] : 0;
    $featured = isset($_POST['featured']) ? $_POST['featured'] : 0;
    $special_offer = isset($_POST['special_offer']) ? $_POST['special_offer'] : 0;
    $special_deals = isset($_POST['special_deals']) ? $_POST['special_deals'] : 0;


    $stmt = $conn->prepare("UPDATE `products` SET 
    `product_name` = ?, 
    `product_slug` = ?, 
    `product_tags` = ?, 
    `product_size` = ?, 
    `product_color` = ?, 
    `short_descp` = ?, 
    `long_descp` = ?, 
    `selling_price` = ?, 
    `discount_price` = ?, 
    `product_code` = ?, 
    `product_qty` = ?, 
    `brand_id` = ?, 
    `category_id` = ?, 
    `subcategory_id` = ?, 
    `vendor_id` = ?, 
    `hot_deals` = ?, 
    `featured` = ?, 
    `special_offer` = ?, 
    `special_deals` = ?
    WHERE `id` = ?");

$stmt->bind_param('sssssssssssssssssssi',
    $product_name,
    $product_slug,
    $product_tags,
    $product_size,
    $product_color,
    $short_descp,
    $long_descp,
    $selling_price,
    $discount_price,
    $product_code,
    $product_qty,
    $brand_id,
    $category_id,
    $subcategory_id,
    $vendor_id,
    $hot_deals,
    $featured,
    $special_offer,
    $special_deals,
    $product_id);

$result = $stmt->execute();

if ($result) {
    $_SESSION['message'] = 'Product updated successfully without image';
        $_SESSION['alert-type'] = 'success';
        header("Location: /admin/all/products");
    exit();
} else {
    $_SESSION['message'] = 'Product update failed';
    $_SESSION['alert-type'] = 'success';
    header("Location: /edit/product/$product_id");
    exit();
}


    }

}


function updateThumbnail($conn, $product_id)
{
    if (isset($_POST['update_thumbnail'])) {

        $old_thumbnail = '';
        $stmt = $conn->prepare("SELECT product_thumbnail FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->bind_result($old_thumbnail);
        $stmt->fetch();
        $stmt->close();
  
    if ($_FILES['product_thumbnail']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['product_thumbnail']['tmp_name'];
        $filename = $_FILES['product_thumbnail']['name'];
        $destination = "./views/public/uploads/product/thumbnails/" . $filename;
        move_uploaded_file($tmp_name, $destination);

        // Update the product record with the main thumbnail path
        $stmt = $conn->prepare("UPDATE products SET product_thumbnail = ? WHERE id = ?");
        $stmt->bind_param("si", $destination, $product_id);
       $result =  $stmt->execute();
       if ($result) {
        
        if (!empty($old_thumbnail) && file_exists($old_thumbnail)) {
            unlink($old_thumbnail);
        }

        $_SESSION['message'] = 'Product thumbnail updated successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /admin/all/products");
        exit();
       }else{
        $_SESSION['message'] = 'Product thumbnail update failed';
        $_SESSION['alert-type'] = 'error';
        header("Location: /edit/product/$product_id");
        exit();
       }
    } else{
        echo 'no';
    }
 }

}


function updateImages($conn, $product_id)
{
    if (isset($_POST['update_images'])) {
        foreach ($_FILES['multi_img']['tmp_name'] as $image_id => $tmp_name) {
            if ($_FILES['multi_img']['error'][$image_id] === UPLOAD_ERR_OK) {
                $filename = $_FILES['multi_img']['name'][$image_id];
                $destination = "./views/public/uploads/product/product_images/" . $filename;
                move_uploaded_file($tmp_name, $destination);
    
                // Update the product image record with the new image path
                $stmt = $conn->prepare("UPDATE product_images SET image_path = ? WHERE id = ?");
                $stmt->bind_param("si", $destination, $image_id);
                $result = $stmt->execute();
                
                if ($result) {
                    $_SESSION['message'] = 'Product image updated successfully';
                    $_SESSION['alert-type'] = 'success';
                    header("Location: /edit/product/$product_id");
                    exit();
                }
            }
        }
    }
    

}


function toggleProductStatus($conn, $product_id)
{
    $sql = $conn->query("SELECT * FROM `products` WHERE id = $product_id");
    $row = $sql->fetch_assoc();

    if ($row['status'] === '1') {

        $stmt = $conn->prepare("UPDATE `products` SET `status`= '0' WHERE id = ?");
        $stmt->bind_param('s', $product_id);
        $result = $stmt->execute();
       
        if ($result) {
            $_SESSION['message'] = 'Product Inactive';
            $_SESSION['alert-type'] = 'success';
            header("Location: /admin/all/products");
            exit();
        }

    } else{

        $stmt = $conn->prepare("UPDATE `products` SET `status`= '1' WHERE id = ?");
        $stmt->bind_param('s', $product_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'Product Active';
            $_SESSION['alert-type'] = 'success';
            header("Location: /admin/all/products");
            exit();
        }
        
    }
}


function deleteProduct($conn, $product_id)
{
    $old_thumbnail = '';
    $stmt = $conn->prepare("SELECT product_thumbnail FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->bind_result($old_thumbnail);
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn->prepare("SELECT image_path FROM product_images WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $old_images = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param('i', $product_id);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        if (!empty($old_thumbnail) && file_exists($old_thumbnail)) {
            unlink($old_thumbnail);
        }

        foreach ($old_images as $image) {
            $img_path = $image['image_path'];
            if (!empty($img_path) && file_exists($img_path)) {
                unlink($img_path);
            }
        }

        $_SESSION['message'] = 'Product deleted successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /admin/all/products");
        exit();
    }
}

function deleteProductMultiimage($conn, $multiimage_id)
{

    $stmt = $conn->prepare("SELECT * FROM product_images WHERE id = ?");
    $stmt->bind_param("i", $multiimage_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $old_image = $result->fetch_assoc();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM product_images WHERE id = ?");
    $stmt->bind_param("i", $multiimage_id);
    $result = $stmt->execute();

    if ($result) {
       if (!empty($old_image['image_path'] && file_exists($old_image['image_path']))) {
        unlink($old_image['image_path']);
       }

       $_SESSION['message'] = 'Product Image deleted successfully';
       $_SESSION['alert-type'] = 'success';
       header("Location: /admin/all/products");
       exit();
    }
}

// Process the form based on the request URI
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $product_id = explode('/', $uri);
    $product_id = $product_id['3'];
    

    if ($uri === '/update/product/' . $product_id) {
        updateProduct($conn, $product_id);
    }  elseif ($uri === '/status/product/' . $product_id) {
        toggleProductStatus($conn, $product_id);
    } elseif ($uri === '/delete/product/' . $product_id) {
        deleteProduct($conn, $product_id);
    }
}


if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $product_id = explode('/', $uri);
    $product_id = $product_id['4'];

    if ($uri === '/update/product/thumbnail/' . $product_id) {
        updateThumbnail($conn, $product_id);
    } elseif ($uri === '/update/product/images/' . $product_id) {
        updateImages($conn, $product_id);
    }
}


if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $multiimage_id = explode('/', $uri);
    $multiimage_id = $multiimage_id['5'];

if ($uri === '/vendor/product/multiimage/delete/'. $multiimage_id) {
    deleteProductMultiimage($conn, $multiimage_id);
}

}