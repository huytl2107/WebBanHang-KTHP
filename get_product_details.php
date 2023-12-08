<?php
include('db\config.php');

// Kiểm tra xem có tham số id sản phẩm được chuyển qua không
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy chi tiết sản phẩm
    $query = "SELECT * FROM tbl_products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem truy vấn có thành công không
    if ($result) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    }
} else {
    // Nếu không có id sản phẩm, có thể chuyển hướng hoặc xử lý khác tùy thuộc vào yêu cầu của bạn.
    echo "Không có ID sản phẩm được cung cấp";
}
?>
