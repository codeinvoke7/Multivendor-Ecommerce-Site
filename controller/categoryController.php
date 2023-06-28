<?php
session_start();
require "./database.php";

function addCategory($conn)
{
    if (isset($_POST['save'])) {
        $category = $_POST['name'];
        $filename = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        $category = filter_var($category, FILTER_SANITIZE_STRING);
        $category_slug = strtolower($category);
        $category_slug = str_replace(' ', '-', $category_slug);

        move_uploaded_file($tmp, './views/public/uploads/category/' . $filename);
        $stmt = $conn->prepare("INSERT INTO `categories` (`category`, `slug`, `image`) VALUES (?,?,?)");
        $stmt->bind_param('sss', $category, $category_slug, $filename);
        $result = $stmt->execute();

        if ($result) {
            $_SESSION['cat-added'] = true;
            $_SESSION['message'] = 'Category added successfully';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/categories");
            exit();
        } else {
            header("Location: /add/category");
            exit();
        }
    }
}
addCategory($conn);

function updateCategory($conn, $category_id)
{
    $sql = $conn->query("SELECT * FROM `categories` WHERE id = $category_id");
    $row = $sql->fetch_assoc();
    $cat_image = $row['image'];

    if (isset($_POST['save_changes'])) {
        $category_name = $_POST['name'];
        $category_image = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        $category_name = filter_var($category_name, FILTER_SANITIZE_STRING);
        $category_slug = strtolower($category_name);
        $category_slug = str_replace(' ', '-', $category_slug);

        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($tmp, './views/public/uploads/category/' . $category_image);
        } else {
            $category_image = $cat_image;
        }
        $stmt = $conn->prepare("UPDATE `categories` SET `category`= ?, `slug` = ?, `image` = ? WHERE id = ?");
        $stmt->bind_param('sssi', $category_name, $category_slug, $category_image, $category_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'Category updated Successfully';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/categories");
            exit();
        }
    }
}

function toggleCategoryStatus($conn, $category_id)
{
    $sql = $conn->query("SELECT * FROM `categories` WHERE id = $category_id");
    $row = $sql->fetch_assoc();

    if ($row['status'] === '0') {
        $stmt = $conn->prepare("UPDATE `categories` SET `status`= '1' WHERE id = ?");
        $stmt->bind_param('s', $category_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = 'Category Active';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/categories");
            exit();
        }
    } elseif ($row['status'] === '1') {
        $stmt = $conn->prepare("UPDATE `categories` SET `status`= '0' WHERE id = ?");
        $stmt->bind_param('s', $category_id);
        $result = $stmt->execute();
       
        if ($result) {
            $_SESSION['message'] = 'Category Inactive';
            $_SESSION['alert-type'] = 'success';
            header("Location: /all/categories");
            exit();
        }
    }
}

function deleteCategory($conn, $category_id)
{
    $stmt = $conn->prepare("DELETE FROM `categories` WHERE id = ?");
    $stmt->bind_param('i', $category_id);
    $result = $stmt->execute();
    if ($result) {
        $_SESSION['message'] = 'Category deleted Successfully';
        $_SESSION['alert-type'] = 'success';
        header("Location: /all/categories");
        exit();
    }
}

// Process the form based on the request URI
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $category_id = explode('/', $uri);
    $category_id = $category_id['3'];

    if ($uri === '/update/category/' . $category_id) {
        updateCategory($conn, $category_id);
    } elseif ($uri === '/status/category/' . $category_id) {
        toggleCategoryStatus($conn, $category_id);
    } elseif ($uri === '/delete/category/' . $category_id) {
        deleteCategory($conn, $category_id);
    }
}
