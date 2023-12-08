
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
                        <img class="larger-card-img" src="' . $row['img'] . '" alt="Card image">
                        </a>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 style="height: 60px; overflow: hidden;"><a href="product_details.php?id=' . $row['id'] . ' " class="card-title">' . $row['tenSP'] . '</a></h4>
                            <p class="card-text">' . $row['giaSP'] . 'đ</p>
                            <div class="d-flex justify-content-around w-100">
                                <a href="#?id=' . $row['id'] . ' " class="btn-buy btn btn-success">Buy</a>
                                <a href="#?id=' . $row['id'] . ' " class="btn-addtocart btn btn-success" onclick="addToCart(' . $row['id'] . ')"><i class="bi bi-cart"></i></a>
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
	
	<!--Hiển thị thông báo-->
	<?php include("notification.php"); ?>

</body>
</html>
