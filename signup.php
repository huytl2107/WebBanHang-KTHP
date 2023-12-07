<?php
//kết nối với database
require 'db/config.php';
if(isset($_POST['btn-dangky'])){
    $sdt_dangky = $_POST['sdt_dangky'];
    $pass_dangky = $_POST['pass_dangky'];
    $cfpass_dangky = $_POST['cfpass_dangky'];
    //kiếm tra và insert dữ liệu vào database
    if(!empty($sdt_dangky)&&!empty($pass_dangky)&&!empty($cfpass_dangky)){
        if($pass_dangky==$cfpass_dangky){
            $sql = "INSERT INTO `tbl_user` (`sdt`, `pass`) VALUE('$sdt_dangky', '$pass_dangky')";
            if($conn->query($sql)===TRUE){
                echo "insert thành công";
            }else{
                echo "Lỗi";
            }
        }
        else{
            echo "Mật khẩu xác nhận không đúng";
        }
    } else {
        echo "Bạn cần nhập đầy đủ thông tin";
    }

}
?>