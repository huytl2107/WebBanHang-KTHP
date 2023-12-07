<?php
    //lấy dữ liệu từ form gửi lên
    $sdt = $_POST['sdt'];
    $pass = $_POST['pass'];
    //kết nối đến cơ sở dữ liệu
    require 'db/db_module.php';
    // Tạo kết nối

    //truy vấn dữ liệu
    $sql = "select * from tbl_user where sdt='$sdt' and pass='$pass'";

    $rs = chayTruyVanTraVeDL($conn, $sql);
    print_r ($rs);

    if(mysqli_num_rows($rs) > 0){
        echo "<h2>Đăng nhập thành công</h2>";
    } else{
        echo "<h2>Đăng nhập thất bại</h2>";
    }

    // Giải phóng bộ nhớ
    giaiPhongBoNho($conn, $rs);
?>