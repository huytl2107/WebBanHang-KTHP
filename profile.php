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

    <div class="container">
		<div class="profile" id="profile" style="background-color: #eee;">
            <section style="background-color: #eee;">
				<div class="container py-5">
				  <div class="row">
					<?php 

					User::loadThongTinUser();
					?>
				  </div>
				</div>
			  </section>
			  <div class="text-center mt-4">
            	<a href="logout.php" class="btn btn-danger">Đăng xuất</a>
        	</div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<script>
		document.getElementById("btnChinhSua").addEventListener("click", function() {
			// Khi nút chỉnh sửa được nhấn, bạn có thể kích hoạt chế độ chỉnh sửa thông tin ở đây
			document.getElementById("ten").readOnly = false;
			document.getElementById("gioiTinh").readOnly = false;
			document.getElementById("diaChi").readOnly = false;
			document.getElementById("soDienThoai").readOnly = false;
			document.getElementById("email").readOnly = false;
		});
	</script>

</body>
</html>
