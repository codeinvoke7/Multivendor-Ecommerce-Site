<?php
session_start();
require "./database.php";

if (isset($_POST['save'])) {
    $brand_name = $_POST['name'];
    $brand_image = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    $brand_name = filter_var($brand_name, FILTER_SANITIZE_STRING);
    $brand_slug = strtolower($brand_name);
    $brand_slug = str_replace(' ', '-', $brand_slug);
    

    move_uploaded_file($tmp, './views/public/uploads/brand/' . $brand_image );
    $stmt = $conn->prepare("INSERT INTO `brands` (`brand_name`, `brand_slug`, `brand_image`) VALUES (?,?,?)");
    $stmt->bind_param('sss', $brand_name, $brand_slug, $brand_image);
    $result = $stmt->execute();

    if($result){
        $_SESSION['cat-added'] = true;
        $_SESSION['message'] = 'Brand added successfully';
            $_SESSION['alert-type'] = 'success';
        header("Location: /all/brands");
        exit();
    }else{
        header("Location: /add/brand");
        exit();
    }
}

// update
function updateBrand($conn, $brand_id)
{
   $sql = $conn->query("SELECT * FROM `brands` WHERE id = $brand_id");
        $row = $sql->fetch_assoc();
        $brand_name = $row['brand_name'];
        $brnd_image = $row['brand_image'];

  
        if (isset($_POST['save_changes'])) {
           $brand_name = $_POST['name'];
           $brand_image = $_FILES['file']['name'];
           $tmp = $_FILES['file']['tmp_name'];

           $brand_name = filter_var($brand_name, FILTER_SANITIZE_STRING);
            $brand_slug = strtolower($brand_name);
            $brand_slug = str_replace(' ', '-', $brand_slug);
                

            
            if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($tmp, './views/public/uploads/brand/' . $brand_image);
            } else {
                $brand_image = $brnd_image;
            }
            $stmt = $conn->prepare("UPDATE `brands` SET `brand_name`= ?, `brand_slug` = ?, `brand_image` = ? WHERE id = ?");
            $stmt->bind_param('sssi', $brand_name, $brand_slug, $brand_image, $brand_id);
            $result = $stmt->execute();
            if ($result) {
               $_SESSION['message'] = 'Brand updated Successfully';
               $_SESSION['alert-type'] = 'success';
               header("Location: /all/brands");
               exit();
         }
    }
}


// status
function toggleBrandStatus($conn, $brand_id)
{

   $sql = $conn->query("SELECT * FROM `brands` WHERE id = $brand_id");
        $row = $sql->fetch_assoc();

        if ($row['status'] === '0') {
            $stmt = $conn->prepare("UPDATE `brands` SET `status`= '1' WHERE id = ?");
            $stmt->bind_param('s', $brand_id);
            $result = $stmt->execute();
            if ($result) {
               $_SESSION['message'] = 'Brand Active';
               $_SESSION['alert-type'] = 'success';
               header("Location: /all/brands");
               exit();
         }
        }elseif($row['status'] === '1'){
            $stmt = $conn->prepare("UPDATE `brands` SET `status`= '0' WHERE id = ?");
            $stmt->bind_param('s',  $brand_id);
            $result = $stmt->execute();
            if ($result) {
               $_SESSION['message'] = 'Brand Inactive';
               $_SESSION['alert-type'] = 'success';
               header("Location: /all/brands");
               exit();
         }
        }
    }


function deleteBrand($conn, $brand_id)
{
            $stmt = $conn->prepare("DELETE FROM `brands` WHERE id = ?");
            $stmt->bind_param('i', $brand_id);
            $result = $stmt->execute();
            if ($result) {
               $_SESSION['message'] = 'Brand deleted Successfully';
               $_SESSION['alert-type'] = 'success';
               header("Location: /all/brands");
               exit();
            }
        }  



// Process the form based on the request URI
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $brand_id = explode('/', $uri);
    $brand_id = $brand_id['3'];

    if ($uri === '/update/brand/' . $brand_id) {
        updateBrand($conn, $brand_id);
    } elseif ($uri === '/status/brand/' . $brand_id) {
        toggleBrandStatus($conn, $brand_id);
    } elseif ($uri === '/delete/brand/' . $brand_id) {
        deleteBrand($conn, $brand_id);
    }
}