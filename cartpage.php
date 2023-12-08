<?php
session_start()
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gio Hang</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>

	<!--NavBar-->
	<?php include("navbar.php")
	?>

	<div class="container">
		<div class="row">
			<!--Cột Menu-->
			<div class="menu col-sm-2 d-md-block d-none">
				<?php include("menu.php") ?>
			</div>
			<!--Cột Sản Phẩm-->
			<div class="sanpham col-sm-10">
				<div class="row" id="sanpham">
					<section class="h-100" style="background-color: #eee;">
						<div class="container h-100 py-5">
							<div class="row d-flex justify-content-center align-items-center h-100">
								<div class="col-10">

									<div class="d-flex justify-content-between align-items-center mb-4">
										<h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
										<button class="btn btn-danger" onclick="clearCart()">Xóa giỏ hàng</button>
									</div>


									<?php
									// Kiểm tra xem mảng 'productIds' đã tồn tại trong session chưa
									if (isset($_SESSION['productIds'])) {
										$productIds = $_SESSION['productIds'];
										foreach ($productIds as $productId) {
											//
											$query = "SELECT * FROM tbl_products WHERE id = $productId";
											$result = mysqli_query($conn, $query);
											// Kiểm tra xem truy vấn có thành công không
											if ($result) {
												$product = mysqli_fetch_assoc($result);
												echo '
													<div class="card rounded-3 mb-4">
													<div class="card-body p-4">
														<div class="row d-flex justify-content-between align-items-center">
															<div class="col-md-2 col-lg-2 col-xl-2">
																<img src="' . $product['img'] . '" class="img-fluid rounded-3" alt="Cotton T-shirt">
															</div>
															<div class="col-md-3 col-lg-3 col-xl-3">
																<p class="lead fw-normal mb-2">' . $product['tenSP'] . '</p>
																<p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
															</div>
															<div class="col-md-3 col-lg-3 col-xl-2 d-flex">
																<button class="btn btn-link px-2" style="text-decoration: none;" onclick="this.parentNode.querySelector("input[type=number]").stepDown()">-</button>

																<input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" />

																<button class="btn btn-link px-2" style="text-decoration: none;" onclick="this.parentNode.querySelector("input[type=number]").stepUp()">+</button>
															</div>
															<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
																<h5 class="mb-0">' . $product['giaSP'] . 'đ</h5>
															</div>
															<div class="col-md-1 col-lg-1 col-xl-1 text-end">
																<a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
															</div>
														</div>
													</div>
												</div>
													';
											} else {
												echo "Lỗi truy vấn: " . mysqli_error($conn);
											}
										}
									}
									?>

									<div class="card">
										<div class="card-body">
											<button type="button" class="btn btn-warning btn-block btn-lg" style="width: 100%; --bs-btn-active-bg: #e3bd4c">Mua tất cả</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<?php include("footer.php");?>
		<script src="script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>