<?php
// Kết nối CSDL
include('db/config.php');

// Số sản phẩm mỗi trang
$productsPerPage = 15;

// Xác định trang hiện tại
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Tính offset (vị trí bắt đầu của dữ liệu trên trang hiện tại)
$offset = ($currentPage - 1) * $productsPerPage;

// Truy vấn để lấy dữ liệu sản phẩm với phân trang
$query = "SELECT p.id, p.tenSP, p.giaSP, t.name_type 
        FROM tbl_products p
        JOIN tbl_products_types t ON p.id_type = t.id_type
        LIMIT $offset, $productsPerPage";

$result = mysqli_query($conn, $query);

// Bắt đầu xây dựng HTML cho bảng sản phẩm
$html = '<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">tenSP</th>
                    <th scope="col">giaSP</th>
                    <th scope="col">loaiSP</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <th scope="row">' . $row['id'] . '</th>
                <td>' . $row['tenSP'] . '</td>
                <td>' . $row['giaSP'] . '</td>
                <td>' . $row['name_type'] . '</td>
                <td><a href="#" class="text-decoration-none text-danger" data-id="' . $row['id'] . '" onclick="deleteProduct(' . $row['id'] . ')">Xóa<i class="bi bi-person-x"></i></a></td>
                <td><a href="#" class="text-decoration-none text-warning" data-id="' . $row['id'] . '" onclick="editProduct(' . $row['id'] . ')">Sửa<i class="bi bi-pen"></i></a></td>
              </tr>';
}

$html .= '</tbody></table>';


// Truy vấn để lấy tổng số sản phẩm
$queryCount = "SELECT COUNT(*) AS total FROM tbl_products";
$resultCount = mysqli_query($conn, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount)['total'];

// Tính tổng số trang
$totalPages = ceil($rowCount / $productsPerPage);

// Thêm Bootstrap Pagination
$html .= '<nav aria-label="Page navigation example">
            <ul class="pagination">';

            for ($i = 1; $i <= $totalPages; $i++) {
                $html .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="showProductsTable(' . $i . ')">' . $i . '</a></li>';
            }
            

$html .= '</ul>
            </nav>';

// Trả về HTML cho bảng sản phẩm và phân trang
echo $html;

// Đóng kết nối CSDL
mysqli_close($conn);
?>
