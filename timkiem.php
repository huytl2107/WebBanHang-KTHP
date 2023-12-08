
<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Ban Hang</title>
	<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
  <body>
	<!--NavBar-->
	<?php include("navbar.php") ?>
	
	<div class="container">
		<div class="row">
			<!--Cột Menu-->
			<div class="menu col-sm-2 d-md-block d-none">
				<?php include("menu.php")?>
			</div>
			<!--Cột Sản Phẩm-->
			<div class="sanpham col-sm-10">
				<div class="row" id="sanpham">
                <?php
                    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

                    if(isset($keyword)){
                        $result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products WHERE tenSP LIKE '%".$keyword."%'");
                    }else{
                        $result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products");
                    }
                    $row = mysqli_fetch_row($result);   
                    if(isset($keyword))
                        $result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products WHERE tenSP LIKE '%".$keyword."%'");
                        while($row=mysqli_fetch_assoc($result)){
                        echo'<div class="card col-lg-3 col-md-6"> 
                        <a href="product_details.php?id=' . $row['id'] . ' ">
                        <img class="larger-card-img" src="'.$row['img'].'" alt="Card image">
                        </a>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4><a href="product_details.php" class="card-title">'.$row['tenSP'].'</a></h4>
                            <p class="card-text">'.$row['giaSP']. 'đ</p>
                            <div class="d-flex justify-content-around w-100">
                                <a href="#" class="btn-buy btn btn-success">Buy</a>
                                <a href="#" class="btn-addtocart btn btn-success"><i class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        </div>';
                    }
                ?>
				</div>
			</div>
		  </div>
	<script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
	<script>
		// Fetch and include login modal
		fetch('login-modal.html')
		  .then(response => response.text())
		  .then(data => {
			document.body.insertAdjacentHTML('beforeend', data);
		  });
		fetch('signup-modal.html')
		  .then(response => response.text())
		  .then(data => {
			document.body.insertAdjacentHTML('beforeend', data);
		  });
	  </script>

	<!--Hiển thị thông báo trả về của form đăng nhập/ đăng ký-->
<?php
		// Kiểm tra xem có thông báo đăng nhập thành công hay không
		if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
			echo '<script>alert("Đăng nhập thành công!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['login_success'] = false;
		}
		// Kiểm tra xem có thông báo đăng nhập thất bại hay không
		if (isset($_SESSION['login_failed']) && $_SESSION['login_failed']) {
			echo '<script>alert("Đăng nhập thất bại!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['login_failed'] = false;
		}
		// Kiểm tra xem có thông báo đăng ký thành công hay không
		if (isset($_SESSION['signup_success']) && $_SESSION['signup_success']) {
			echo '<script>alert("Đăng ký thành công!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['signup_success'] = false;
		}
		// Kiểm tra xem có thông báo ký thất bại hay không
		if (isset($_SESSION['signup_failed']) && $_SESSION['signup_failed']) {
			echo '<script>alert("Mật khẩu xác nhận không đúng!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['signup_failed'] = false;
		}
		if (isset($_SESSION['sdt_tontai']) && $_SESSION['sdt_tontai']) {
			echo '<script>alert("Số điện thoại này đã được đăng ký!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['sdt_tontai'] = false;
		}
		if (isset($_SESSION['signup_null']) && $_SESSION['signup_null']) {
			echo '<script>alert("Không được để trống!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['signup_null'] = false;
		}
		if (isset($_SESSION['signout']) && $_SESSION['signout']) {
			echo '<script>alert("Đăng xuất thành công!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['signout'] = false;
		}
		?>

</body>
</html>
