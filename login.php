<?php
    //lấy dữ liệu từ form gửi lên
    $sdt = $_POST['sdt'];
    $pass = $_POST['pass'];
    //kết nối đến cơ sở dữ liệu
    $db = mysqli_connect("127.0.0.1", "root", "", "webbanhang");
    //truy vấn dữ liệu
    $sql = "select * from tbl_user where sdt='$sdt' and pass='$pass'";

    $rs = mysqli_query($db, $sql);

    if(mysqli_num_rows($rs) > 0){
        echo "<h2>Đăng nhập thành công</h2>";
    } else{
        echo "<h2>Đăng nhập thất bại</h2>";
    }

?>