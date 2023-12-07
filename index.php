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
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success me-2" type="submit">Search</button>
				</form>
			</div>
			<div class="d-flex">
				<a href="#" class="btn-cart me-2"><i class="bi bi-cart"></i></a>
				<a href="#" class="btn-dangnhap" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-person-circle"></i></a>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<!--Cột Menu-->
			<div class="menu col-sm-2 d-md-block d-none">
				<a href="#" class="btn btn-link">Loại sản phẩm 1</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 2</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 3</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 4</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 5</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 6</a>
				<a href="#" class="btn btn-link">Loại sản phẩm 7</a>
			</div>
			<!--Cột Sản Phẩm-->
			<div class="sanpham col-sm-10">
				<div class="row" id="sanpham">
					<!--Thêm sản phẩm từ databese-->
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

</body>
</html>