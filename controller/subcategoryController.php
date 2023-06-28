<?php
session_start();
require "./database.php";

if (isset($_POST['save'])) {
    $subcategory = $_POST['name'];
    $category_id = $_POST['category_id'];

    $subcategory = filter_var($subcategory, FILTER_SANITIZE_STRING);
    $subcategory_slug = strtolower($subcategory);
    $subcategory_slug = str_replace(' ', '-', $subcategory_slug);

    $stmt = $conn->prepare("INSERT INTO `sub_categories` (`subcategory_name`, `category_id`, `subcategory_slug`) VALUES (?,?,?)");
    $stmt->bind_param('sss', $subcategory, $category_id, $subcategory_slug);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['message'] = 'Subcategory added successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/subcategories");
        exit();
    } else {
        header("Location: /add/subcategory");
        exit();
    }
}

function updateSubcategory($conn, $subcategory_id)
{

    $sql = $conn->query("SELECT * FROM `sub_categories` WHERE id = $subcategory_id");
    $row = $sql->fetch_assoc();
    $cat_name = $row['subcategory_name'];


    if (isset($_POST['save_changes'])) {
       $subcategory_name = $_POST['name'];
       $category_id = $_POST['category_id'];

       $subcategory_name = filter_var($subcategory_name, FILTER_SANITIZE_STRING);
        $subcategory_slug = strtolower($subcategory_name);
        $subcategory_slug = str_replace(' ', '-', $subcategory_slug);

    $stmt = $conn->prepare("UPDATE `sub_categories` SET `subcategory_name`= ?, `category_id` = ?, `subcategory_slug` = ? WHERE id = ?");
    $stmt->bind_param('sssi', $subcategory_name, $category_id, $subcategory_slug, $subcategory_id);
    $result = $stmt->execute();
    if ($result) {
        $_SESSION['message'] = 'Subcategory updated Successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/subcategories");
        exit();
    }
}

}

function toggleSubcategoryStatus($conn, $subcategory_id)
{
    $sql = $conn->query("SELECT * FROM `sub_categories` WHERE id = $subcategory_id");
    $row = $sql->fetch_assoc();

    if ($row['status'] === '0') {
        $stmt = $conn->prepare("UPDATE `sub_categories` SET `status`= '1' WHERE id = ?");
        $stmt->bind_param('s', $subcategory_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'Subcategory Active';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/subcategories");
            exit();
        }
    } elseif ($row['status'] === '1') {
        $stmt = $conn->prepare("UPDATE `sub_categories` SET `status`= '0' WHERE id = ?");
        $stmt->bind_param('s', $subcategory_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'Subcategory Inactive';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/subcategories");
            exit();
        }
    }
}

function deleteSubcategory($conn, $subcategory_id)
{
    $stmt = $conn->prepare("DELETE FROM `sub_categories` WHERE id = ?");
    $stmt->bind_param('i', $subcategory_id);
    $result = $stmt->execute();
    if ($result) {
        $_SESSION['message'] = 'Subcategory deleted Successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/subcategories");
        exit();
    }
}

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $subcategory_id = explode('/', $uri);
    $subcategory_id = $subcategory_id['3'];

    if ($uri === '/update/subcategory/' . $subcategory_id) {
        updateSubcategory($conn, $subcategory_id);
    }

    if ($uri === '/status/subcategory/' . $subcategory_id) {
        toggleSubcategoryStatus($conn, $subcategory_id);
    }

    if ($uri === '/delete/subcategory/' . $subcategory_id) {
        deleteSubcategory($conn, $subcategory_id);
    }
}

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $categoryID = explode('/', $uri);
   $categoryID = $categoryID['3'];
    if ($uri === '/subcategory/ajax/'. $categoryID) {

$sql = $conn->query("SELECT * FROM `sub_categories` WHERE `category_id` = $categoryID");
$subcategories = array();
while ($row = $sql->fetch_assoc()) {
  $subcategories[] = $row;
}

// Return the subcategories as a JSON response
echo json_encode($subcategories);
    }
}