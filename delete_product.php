<?php
include('db/config.php');

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Thực hiện câu lệnh xóa người dùng từ CSDL
    $query = "DELETE FROM tbl_products WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    // Nếu xóa thành công, trả về HTML mới cho bảng người dùng
    if ($result) {
        include('load_product_table.php');
    } else {
        echo "Xóa sản phẩm thất bại";
    }
}
?>
