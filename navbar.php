<?php 
require 'class/user.php';
$user = User::checkDangNhap();
echo '
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Home</a>
			<button class="navbar-toggler ms-auto me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Loại sản phẩm
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex" method="get" action="timkiem.php" role="search">
					<input class="form-control me-2" type="search" name="keyword" id="keyword" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success me-2" type="submit" >Search</button>
				</form>
			</div>
			<div class="d-flex">
				<a href="cartpage.php" class="btn-cart me-2"><i class="bi bi-cart"></i></a>';
				
				// Nếu đã đăng nhập 
				if ($user) {
					// Nếu là admin
					if(isset($_COOKIE['userRole'])){
					echo '<a href="admin_page/admin.php" class="btn-dangnhap"><i class="bi bi-person-circle"></i></a>';
					} else {
                    // Nếu là user -> Profile.php
                    echo '<a href="profile.php" class="btn-dangnhap"><i class="bi bi-person-circle"></i></a>';
					}
				} else {
                    // Nếu chưa đăng nhập -> Modal đăng nhập
                    echo '<a href="#" class="btn-dangnhap" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-person-circle"></i></a>';
                }
                echo '
				
			</div>
		</div>
	</nav>';
?>