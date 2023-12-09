<?php
include("db\config.php");
include("class\user.php");
session_start();

if (User::checkDangNhap()) {
    session_start();
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

        // Cập nhật thông tin người dùng
        $loggedInUser->updateUserInfo($hoTen, $diaChi, $email, $gioiTinh, $sodt);

        // Redirect hoặc hiển thị thông báo thành công tùy thuộc vào yêu cầu của bạn
        header("Location: profile.php?success=1");
        exit();
    }
} else {
    // Người dùng chưa đăng nhập, xử lý theo ý của bạn
    header("Location: login.php");
    exit();
}
?>
