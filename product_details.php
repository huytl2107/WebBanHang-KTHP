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
	<?php include("navbar.php");
		include('get_product_details.php'); 
	?>

    <div class="container mt-4">
		<div class="row">
			<!--Cột Menu-->
			<div class="menu col-sm-2 d-md-block d-none">
				<?php include("menu.php")?>
			</div>
			<!--Cột chứa thông tin sản phẩm-->
            <div class="col-sm-10">
                <div class="row">
					<div class="col-md-6">
   						<img src="<?php echo $product['img']; ?>" class="img-fluid" alt="Product Image">
					</div>
					<div class="col-md-6">
    					<h2><?php echo $product['tenSP']; ?></h2>
    					<p><?php echo $product['moTa']; ?></p>
    					<p>Giá: <?php echo $product['giaSP']; ?></p>
    					<button class="btn btn-primary" <?php echo 'onclick="addToCart(' . $product["id"] . ')"'; ?>>Thêm vào giỏ hàng</button>
					</div>
                </div>
                <h2 class="mt-4">Sản phẩm liên quan</h2>
                <div class="row" id="sanpham">
                    <!-- Thêm thẻ sản phẩm từ database -->
                </div>
            </div>
		</div>
    </div>
	<?php include("footer.php");?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<!--Hiển thị thông báo-->
	<?php include("notification.php"); ?>

</body>
</html>
