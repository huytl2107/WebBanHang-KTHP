<?php
    session_start();
    setcookie('loggedInUser', '', time() - 3600, '/');
    setcookie('userRole', null, time() - 3600, '/');
    $_SESSION['signout'] = true;

    // Chuyển hướng về trang index
    header("Location: index.php");
    exit();

    // Giải phóng bộ nhớ
    giaiPhongBoNho($conn, $rs);
?>