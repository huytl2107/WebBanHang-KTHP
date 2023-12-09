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
    					<p>Giá: <?php echo $product['giaSP']; ?>,000đ</p>
    					<button class="btn btn-primary" <?php echo 'onclick="addToCart(' . $product["id"] . ')"'; ?>>Thêm vào giỏ hàng</button>
					</div>
                </div>
                <h2 class="mt-4">Sản phẩm liên quan</h2>
                <div class="row" id="sanpham">
				<?php
				// Check if $relatedProducts is set and not null
				if (isset($relatedProducts) && !is_null($relatedProducts)) {
					foreach ($relatedProducts as $relatedProduct) {
						echo '<div class="card col-lg-3 col-md-6"> 
									<a href="product_details.php?id=' . $relatedProduct['id'] . ' ">
									<img class="larger-card-img" src="' . $relatedProduct['img'] . '" alt="Card image">
									</a>
									<div class="card-body d-flex flex-column align-items-center">
										<h4 style="height: 60px; overflow: hidden;"><a href="product_details.php?id=' . $relatedProduct['id'] . '" class="card-title">' . $relatedProduct['tenSP'] . '</a></h4>
										<p class="card-text">' . $relatedProduct['giaSP'] . ',000đ</p>
										<div class="d-flex justify-content-around w-100">
											<a href="#?id=' . $relatedProduct['id'] . '" class="btn-buy btn btn-success" onclick="laygiaSP(' . $relatedProduct['id'] . ')">Buy</a>
											<a href="#?id=' . $relatedProduct['id'] . '" class="btn-addtocart btn btn-success" onclick="addToCart(' . $relatedProduct['id'] . ')"><i class="bi bi-cart"></i></a>
										</div>
									</div>
								</div>';
					}
				} else {
					echo '<p>Không có sản phẩm liên quan.</p>';
				}
				?>
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
