<?php
include('db/config.php');

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    
    $query = "SELECT giaSP FROM tbl_products WHERE id = $productId";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $product = mysqli_fetch_assoc($result);
        echo $product['giaSP'];
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    }
}
?>
