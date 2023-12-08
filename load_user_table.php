<?php
// Kết nối CSDL (điều này phải được thực hiện trong tệp của bạn)
include('db/config.php');

// Truy vấn để lấy dữ liệu người dùng
$query = "SELECT * FROM tbl_user";
$result = mysqli_query($conn, $query);

// Bắt đầu xây dựng HTML cho bảng người dùng
$html = '<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">hoTen</th>
                    <th scope="col">gioiTinh</th>
                    <th scope="col">sdt</th>
                    <th scope="col">email</th>
                    <th scope="col">diaChi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <th scope="row">' . $row['id'] . '</th>
                <td>' . $row['hoTen'] . '</td>
                <td>' . $row['gioiTinh'] . '</td>
                <td>' . $row['sdt'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['diaChi'] . '</td>
                <td><a href="#" class="text-decoration-none text-danger" data-id="' . $row['id'] . '" onclick="deleteUser(' . $row['id'] . ')">Xóa<i class="bi bi-person-x"></i></a></td>
              </tr>';
}

$html .= '</tbody></table>';

// Trả về HTML cho bảng người dùng
echo $html;

// Đóng kết nối CSDL
mysqli_close($conn);
?>
