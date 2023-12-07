<?php
// user.php
class User {
    // Thuộc tính của đối tượng User
    public $id;
    public $hoTen = null;
    public $diaChi = null;
    public $email = null;
    public $gioiTinh = null;
    public $role = 0;
    public $sdt;
    public $pass;

    // Phương thức sửa thông tin
    public function __construct($id, $sdt, $pass, $hoTen = null, $diaChi = null, $email = null, $gioiTinh = null, $role = 0 ) {
        $this->id = $id;
        $this->hoTen = $hoTen;
        $this->diaChi = $diaChi;
        $this->email = $email;
        $this->gioiTinh = $gioiTinh;
        $this->sdt = $sdt;
        $this->pass = $pass;
        $this->role = $role;
    }

    public function luuThongTinUser(){

        // Chuyển đối tượng thành mảng
        $userData = [
            'id' => $this->id,
            'sdt' => $this->sdt,
            'pass' => $this->pass,
            'hoTen' => $this->hoTen,
            'diaChi' => $this->diaChi,
            'email' => $this->email,
            'gioiTinh' => $this->gioiTinh,
            'role' => $this->role
        ];
        // Chuyển mảng thành chuỗi JSON
        $userDataJson = json_encode($userData);

        // Lưu chuỗi JSON vào cookie
        setcookie('loggedInUser', $userDataJson, time() + 3600, '/');

    }
    public static function loadThongTinUser(){
        // Kiểm tra xem cookie có tồn tại không
					if(isset($_COOKIE['loggedInUser'])) {
						// Lấy giá trị của cookie
						$userDataJson = $_COOKIE['loggedInUser'];
						
						// Chuyển đổi chuỗi JSON thành mảng hoặc đối tượng
						$userData = json_decode($userDataJson, true); // Nếu bạn muốn mảng, sử dụng true

						// Tạo đối tượng User từ dữ liệu
						$loggedInUser = new User($userData['id'], $userData['sdt'], $userData['pass'], $userData['hoTen'], $userData['diaChi'], $userData['email'], $userData['gioiTinh'], $userData['role']);
					
					
					echo '
						<div class="col-lg-4">
						<div class="card mb-4">
							<div class="card-body text-center">
							<img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="avatar"
								class="rounded-circle img-fluid" style="width: 150px;">
							<h5 class="name">' . $loggedInUser->sdt . '</h5>
							<p class="address text-muted mb-4">' . $loggedInUser->diaChi . '</p>
							<div class="d-flex justify-content-center mb-2">
								<button type="button" class="btn btn-primary">Chỉnh sửa thông tin <i class="bi bi-pen"></i></button>
							</div>
							</div>
						</div>
						</div>
						<div class="col-lg-8">
						<div class="card mb-4">
							<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
								<p class="mb-0">Họ Tên:</p>
								</div>
								<div class="col-sm-9">
								<p class="text-muted mb-0">' . $loggedInUser->hoTen . '</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
								<p class="mb-0">Email</p>
								</div>
								<div class="col-sm-9">
								<p class="text-muted mb-0">' . $loggedInUser->email . '</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
								<p class="mb-0">Số điện thoại</p>
								</div>
								<div class="col-sm-9">
								<p class="text-muted mb-0">' . $loggedInUser->sdt . '</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
								<p class="mb-0">Giới tính</p>
								</div>
								<div class="col-sm-9">
								<p class="text-muted mb-0">' . $loggedInUser->gioiTinh . '</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
								<p class="mb-0">Địa chỉ</p>
								</div>
								<div class="col-sm-9">
								<p class="text-muted mb-0">' . $loggedInUser->diaChi . '</p>
								</div>
							</div>
							</div>
						</div>
						</div>';
					}
    }
    
}

?>