<?php
    require_once "db/config.php";

    function taoKetnoi(&$link)
    {
        $link = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_error()){
            echo "Lỗi kết nối đến máy chủ: " .mysqli_connect_error();
            exit();
        }

    }
    function chayTruyVanTraVeDuLieu($link, $q)
    {
        $result = mysqli_query($link, $q);
        return $result;
    }
    function chayTruyVanKhongTraVeDuLieu($link, $q)
    {
        $result = mysqli_query($link, $q);
        return $result;
    }
    function giaiPhongBoNho($link, $result)
    {
        try {
            mysqli_close($link);
            mysqli_free_result($result);
        } catch(TypeError $e) {}
    }
?>