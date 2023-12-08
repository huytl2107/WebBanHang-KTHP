<?php
session_start();
include('db/config.php');

// Hàm tính tổng số tiền từ giỏ hàng
function calculateTotalPrice($productIds, $conn) {
    $totalPrice = 0;
    foreach ($productIds as $productId) {
        $query = "SELECT giaSP FROM tbl_products WHERE id = $productId";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $product = mysqli_fetch_assoc($result);
            $totalPrice += $product['giaSP'];
        }
    }
    return $totalPrice;
}

if (isset($_SESSION['productIds'])) {
    $productIds = $_SESSION['productIds'];
    $totalPrice = calculateTotalPrice($productIds, $conn);
}
?>
