<?php
    session_start();

    //kết nối với database
    require 'db/db_module.php';
    if(isset($_POST['btn-dangky'])){
        $sdt_dangky = $_POST['sdt_dangky'];
        $pass_dangky = $_POST['pass_dangky'];
        $cfpass_dangky = $_POST['cfpass_dangky'];
        //kiếm tra và insert dữ liệu vào database
        if(!empty($sdt_dangky)&&!empty($pass_dangky)&&!empty($cfpass_dangky)){
            // Escape các giá trị để tránh SQL injection
            $sdt_dangky = mysqli_real_escape_string($conn, $sdt_dangky);
            $pass_dangky = mysqli_real_escape_string($conn, $pass_dangky);
            // Kiểm tra xem sdt đã tồn tại chưa
            $check_user_sql = "SELECT * FROM tbl_user WHERE sdt='$sdt_dangky'";
            $check_user_result = chayTruyVanTraVeDL($conn, $check_user_sql);

            if (mysqli_num_rows($check_user_result) > 0) {
                $_SESSION['sdt_tontai'] = true;
            } else {
                // Insert dữ liệu vào database
                $insert_sql = "INSERT INTO tbl_user (sdt, pass) VALUES ('$sdt_dangky', '$pass_dangky')";
                if (chayTruyVanTraVeDL($conn, $insert_sql)) {
                    $_SESSION['signup_success'] = true;
                } else {
                    $_SESSION['signup_failed'] = true;
                }
            }
        } else {
            $_SESSION['signup_null'] = true;
        }
    }
    // Chuyển hướng về trang index
    header("Location: index.php");
    exit();

    // Giải phóng bộ nhớ
    giaiPhongBoNho($conn, $check_user_result);
?>