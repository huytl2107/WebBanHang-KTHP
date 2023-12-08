<?php
    session_start();

    //kết nối với database
    require 'db/db_module.php';
    if(isset($_POST['btn-themsp'])){
        $tenSP = $_POST['tenSP'];
        $moTa = $_POST['moTa'];
        $giaSP = $_POST['giaSP'];
        $id_type = $_POST['id_type'];
        $img = $_POST['img'];
        $img2 = $_POST['img2'];

        //kiếm tra và insert dữ liệu vào database
        if(!empty($tenSP)&&!empty($moTa)&&!empty($giaSP)&&!empty($id_type)&&!empty($img)){
            
            // Kiểm tra xem tên SP đã tồn tại chưa
            $check_product_sql = "SELECT * FROM tbl_products WHERE tenSP='$tenSP'";
            $check_product_result = chayTruyVanTraVeDL($conn, $check_product_sql);

            if (mysqli_num_rows($check_product_result) > 0) {
                $_SESSION['SP_tontai'] = true;
            } else {
                // Insert dữ liệu vào database
                $insert_sql = "INSERT INTO tbl_products (tenSP, moTa, giaSP, id_type, img, img2) VALUES ('$tenSP', '$moTa', '$giaSP', '$id_type', '$img', '$img2')";
                if (chayTruyVanTraVeDL($conn, $insert_sql)) {
                    $_SESSION['addSP_success'] = true;
                } else {
                    $_SESSION['addSP_loi'] = true;
                }
            }
        } else {
            $_SESSION['SP_null'] = true;
        }
    }
    // Chuyển hướng về trang admin
    header("Location: admin.php");
    exit();

?>