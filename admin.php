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
        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
        </div>
        <div class="d-grid" style="margin-top: 5px;">
            <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#addProductModal ">Thêm sản phẩm</button>
        </div>

        <!--Bảng user-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">hoTen</th>
                    <th scope="col">gioiTinh</th>
                    <th scope="col">sdt</th>
                    <th scope="col">email</th>
                    <th scope="col">diaChi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Huy</td>
                    <td>Nam</td>
                    <td>0123456789</td>
                    <td>abc@gmail.com</td>
                    <td>TPHCM</td>
                    <td><a href="#" class="text-decoration-none text-danger">Xóa<i class="bi bi-person-x"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Otto</td>
                    <td>Nam</td>
                    <td>0123456789</td>
                    <td>abc@gmail.com</td>
                    <td>TPHCM</td>
                    <td><a href="#" class="text-decoration-none text-danger">Xóa<i class="bi bi-person-x"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Alex</td>
                    <td>Nữ</td>
                    <td>0123456789</td>
                    <td>abc@gmail.com</td>
                    <td>TPHCM</td>
                    <td><a href="#" class="text-decoration-none text-danger">Xóa<i class="bi bi-person-x"></i></a></td>
                </tr>
            </tbody>
        </table>

    </div>
    <?php include("footer.php");?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--Hiển thị thông báo-->
	<?php include("notification.php"); ?>

</body>



</html>