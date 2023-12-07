<?php
//kết nối với database
require 'db/db_module.php';
if(isset($_POST['btn-dangky'])){
    $sdt_dangky = $_POST['sdt_dangky'];
    $pass_dangky = $_POST['pass_dangky'];
    $cfpass_dangky = $_POST['cfpass_dangky'];
    //kiếm tra và insert dữ liệu vào database
    if(!empty($sdt_dangky)&&!empty($pass_dangky)&&!empty($cfpass_dangky)){
        // Tạo kết nối
        $link =  NULL;
        taoKetnoi($link);
        // Escape các giá trị để tránh SQL injection
        $sdt_dangky = mysqli_real_escape_string($link, $sdt_dangky);
        $pass_dangky = mysqli_real_escape_string($link, $pass_dangky);
        // Kiểm tra xem người dùng đã tồn tại chưa
        $check_user_sql = "SELECT * FROM tbl_user WHERE sdt='$sdt_dangky'";
        $check_user_result = chayTruyVanTraVeDuLieu($link, $check_user_sql);

        if (mysqli_num_rows($check_user_result) > 0) {
            echo "Số điện thoại đã tồn tại. Vui lòng chọn số điện thoại khác.";
        } else {
            // Insert dữ liệu vào database
            $insert_sql = "INSERT INTO tbl_user (sdt, pass) VALUES ('$sdt_dangky', '$pass_dangky')";
            if (chayTruyVanKhongTraVeDuLieu($link, $insert_sql)) {
                echo "insert thành công";
            } else {
                echo "Lỗi khi insert dữ liệu";
            }
        }

        // Giải phóng bộ nhớ
        giaiPhongBoNho($link, $check_user_result);
    } else {
        echo "Bạn cần nhập đầy đủ thông tin";
    }

}
?>