<?php
session_start();
?>

<!-- product.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <!--NavBar-->
    <?php include("navbar.php") ?>

    <div class="container mt-4">

        <div class="btn-group btn-group-lg" style="margin-top: 5px; margin-bottom:20px;">
            <button type="button" class="btn btn-primary " onclick="showUserTable()" >User</button>
            <button type="button" class="btn btn-primary" onclick="showProductsTable()" >Product</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal ">Thêm sản phẩm</button>
            <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
        </div>

        <!--Bảng user-->
        <div id="userTableContainer" >
            <!-- Nội dung bảng người dùng sẽ được cập nhật ở đây -->
        </div>

        <!--Bảng sản phẩm-->
        <div id="productsTableContainer" >
            <!-- Nội dung bảng sản phẩm sẽ được cập nhật ở đây -->
        </div>

    </div>
    <?php include("footer.php"); ?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Hiển thị thông báo-->
    <?php include("notification.php"); ?>

</body>



</html>