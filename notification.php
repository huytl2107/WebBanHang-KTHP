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

		//thông báo trang Admin/ thêm sản phẩm
		if (isset($_SESSION['SP_tontai']) && $_SESSION['SP_tontai']) {
			echo '<script>alert("Sản phẩm đã tồn tại!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['SP_tontai'] = false;
		}
		if (isset($_SESSION['SP_null']) && $_SESSION['SP_null']) {
			echo '<script>alert("Không được để trống thông tin!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['SP_null'] = false;
		}
		if (isset($_SESSION['addSP_success']) && $_SESSION['addSP_success']) {
			echo '<script>alert("Thêm sản phẩm thành công!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['addSP_success'] = false;
		}
		if (isset($_SESSION['addSP_loi']) && $_SESSION['addSP_loi']) {
			echo '<script>alert("Lỗi! không thể thêm sản phẩm");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['addSP_loi'] = false;
		}
		if (isset($_SESSION['admin_success']) && $_SESSION['admin_success']) {
			echo '<script>alert("Đăng nhập vào tài khoản Admin thành công!");</script>';
			// Đặt session về giá trị mặc định để tránh hiển thị thông báo nhiều lần
			$_SESSION['admin_success'] = false;
		}
		?>