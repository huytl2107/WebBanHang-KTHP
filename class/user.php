<?php
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

    // Phương thức nhập thông tin
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
	public static function checkDangNhap(){
		// Kiểm tra xem cookie có tồn tại không
		return isset($_COOKIE['loggedInUser']);
	}
	public function checkAdmin(){
		return $this->role;
	}

	public function isSDTExist($sdt) {
		global $conn;
	
		$query = "SELECT COUNT(*) AS count FROM tbl_user WHERE sdt = '$sdt' AND id != " . $this->id;
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	
		return ($row['count'] > 0);
	}

	public function updateUserInfo($hoTen, $diaChi, $email, $gioiTinh, $sdt) {
        global $conn;
		
		// Kiểm tra số điện thoại đã tồn tại hay không

        // Thực hiện cập nhật thông tin người dùng trong cơ sở dữ liệu
        $sql = "UPDATE tbl_user SET 
                hoTen = '$hoTen',
                diaChi = '$diaChi',
                email = '$email',
                gioiTinh = '$gioiTinh',
                sdt = '$sdt'
                WHERE id = $this->id";
    
        // Thực hiện truy vấn
        if ($conn->query($sql) === TRUE) {
            // Sau khi cập nhật thành công, bạn cũng có thể cập nhật lại các thuộc tính của đối tượng User
            $this->hoTen = $hoTen;
            $this->diaChi = $diaChi;
            $this->email = $email;
            $this->gioiTinh = $gioiTinh;
            $this->sdt = $sdt;
        } else {
            // Xử lý lỗi nếu cần
            echo "Lỗi: " . $conn->error;
        }
    }
    
    public static function loadThongTinUser(){
        // Kiểm tra xem cookie có tồn tại không
        if(isset($_COOKIE['loggedInUser'])) {
            // Lấy giá trị của cookie
            $userDataJson = $_COOKIE['loggedInUser'];
            
            // Chuyển đổi chuỗi JSON thành mảng hoặc đối tượng
            $userData = json_decode($userDataJson, true);
    
            // Tạo đối tượng User từ dữ liệu
            $loggedInUser = new User($userData['id'], $userData['sdt'], $userData['pass'], $userData['hoTen'], $userData['diaChi'], $userData['email'], $userData['gioiTinh'], $userData['role']);
            
            // Hiển thị thông tin và nút chỉnh sửa
			echo '<div class="col-lg-4">
			<div class="card mb-4">
				<div class="card-body text-center">
					<img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="avatar"
						class="rounded-circle img-fluid" style="width: 150px;">
					<h5 class="name">' . $loggedInUser->sdt . '</h5>
					<p class="address text-muted mb-4">' . $loggedInUser->diaChi . '</p>
					<div class="d-flex justify-content-center mb-2">
						<button type="button" class="btn btn-primary" id="btnChinhSua">Chỉnh sửa thông tin <i class="bi bi-pen"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card mb-4">
				<div class="card-body">
					<form action="profile_process.php" method="post">
						<!-- Các trường thông tin để chỉnh sửa -->
						<div class="mb-3">
							<label for="ten" class="form-label">Họ Tên:</label>
							<input type="text" class="form-control" id="ten" name="hoTen" value="' . $loggedInUser->hoTen . '" readonly>
						</div>
						<div class="mb-3">
							<label for="diaChi" class="form-label">Địa Chỉ:</label>
							<input type="text" class="form-control" id="diaChi" name="diaChi" value="' . $loggedInUser->diaChi . '" readonly>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email:</label>
							<input type="email" class="form-control" id="email" name="email" value="' . $loggedInUser->email . '" readonly>
						</div>
						<div class="mb-3">
							<label for="gioiTinh" class="form-label">Giới Tính:</label>
							<input type="text" class="form-control" id="gioiTinh" name="gioiTinh" value="' . $loggedInUser->gioiTinh . '" readonly>
						</div>
						<div class="mb-3">
							<label for="soDienThoai" class="form-label">Số Điện Thoại:</label>
							<input type="text" class="form-control" id="sdt" name="sdt" value="' . $loggedInUser->sdt . '" readonly>
						</div>
						<!-- Nút "Lưu thông tin" -->
						<button type="submit" class="btn btn-success" name="btnLuu" style="display:none;">Lưu thông tin</button>
					</form>
				</div>
			</div>
		</div>';
        }
    }
}
?>