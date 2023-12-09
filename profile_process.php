<?php
include("db\config.php");
include("class\user.php");
session_start();

if (User::checkDangNhap()) {
    $userDataJson = $_COOKIE['loggedInUser'];
    $userData = json_decode($userDataJson, true);

    // Tạo đối tượng User từ dữ liệu
    $loggedInUser = new User($userData['id'], $userData['sdt'], $userData['pass'], $userData['hoTen'], $userData['diaChi'], $userData['email'], $userData['gioiTinh'], $userData['role']);

    // Kiểm tra nút "Lưu thông tin" đã được nhấn hay chưa
    if (isset($_POST['btnLuu'])) {
        // Lấy dữ liệu từ form
        $hoTen = $_POST['hoTen'];
        $diaChi = $_POST['diaChi'];
        $email = $_POST['email'];
        $gioiTinh = $_POST['gioiTinh'];
        $sodt = $_POST['sdt'];

        if($loggedInUser->isSDTExist($sodt)){
            // Chuyển hướng về trang profile
            echo '<script>alert("Số điện thoại đã tồn tại. Vui lòng chọn số điện thoại khác.")</script>';
            echo '<meta http-equiv="refresh" content="0;url=profile.php">';
            exit();              
        } else {
            // Cập nhật thông tin người dùng
            $loggedInUser->updateUserInfo($hoTen, $diaChi, $email, $gioiTinh, $sodt);
            //Lưu user vừa cập nhật vào cookie
            $loggedInUser->luuThongTinUser();
            header("Location: profile.php?success=1");
            exit();
        }
    }
} else {
    // Người dùng chưa đăng nhập
    header("Location: login.php");
    exit();
}
?>
