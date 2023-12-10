<?php
    session_start();

    //lấy dữ liệu từ form gửi lên
    $sdt = $_POST['sdt'];
    $pass = $_POST['pass'];
    $role;

    //kết nối đến cơ sở dữ liệu
    require 'db/db_module.php';
    require 'class/user.php';
    // Tạo kết nối

    //truy vấn dữ liệu
    $sql = "select * from tbl_user where sdt='$sdt' and pass='$pass'";

    $rs = chayTruyVanTraVeDL($conn, $sql);

    if(mysqli_num_rows($rs) > 0){
        // Lấy dữ liệu từ kết quả truy vấn
        $userRow = mysqli_fetch_assoc($rs);

        //Nếu role == 1 thì chuyển về trang chủ
        if($userRow['role'] == 1){
            $loggedInUser = new User($userRow['id'], $userRow['sdt'], $userRow['pass'], null , null , null , null ,$userRow['role']);
            setcookie('userRole', 1, time() + 3600, '/');
            $loggedInUser->luuThongTinUser();
            $_SESSION['admin_success'] = true;
            header("Location:index.php");
            exit;
        }
        else{
        // Tạo đối tượng User từ thông tin lấy được
        $loggedInUser = new User($userRow['id'], $userRow['sdt'], $userRow['pass']);

        $loggedInUser->luuThongTinUser();
        }
        // Đặt thông báo vào session
        $_SESSION['login_success'] = true;
    } else{
        // Đặt thông báo vào session
        $_SESSION['login_failed'] = true;
    }
    // Chuyển hướng về trang index
    header("Location: index.php");
    exit();


    // Giải phóng bộ nhớ
    giaiPhongBoNho($conn, $rs);
?>