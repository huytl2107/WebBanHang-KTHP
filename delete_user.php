<?php
include('db/config.php');

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Thực hiện câu lệnh xóa người dùng từ CSDL
    $query = "DELETE FROM tbl_user WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    // Nếu xóa thành công, trả về HTML mới cho bảng người dùng
    if ($result) {
        include('load_user_table.php');
    } else {
        echo "Xóa người dùng thất bại";
    }
}

mysqli_close($conn);
?>
