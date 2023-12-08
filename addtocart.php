<?php
session_start();

// Kiểm tra xem có dữ liệu được gửi từ Ajax hay không
if(isset($_POST['productId'])){
    $productId = $_POST['productId'];

    $_SESSION['productIds'][] = $productId;
} else {
    echo 'Không có productId được chuyển đến.';
}
?>