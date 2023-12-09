<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 8; // Số sản phẩm trên trang
$offset = ($page - 1) * $records_per_page;
$id_type = isset($_GET['id_type']) ? $_GET['id_type'] : null; // Lấy giá trị id_type từ URL

// Truy vấn id_type trong db
$query = ($id_type !== null) ? "SELECT count(*) FROM tbl_products WHERE id_type = $id_type" : "SELECT count(*) FROM tbl_products";
$result = chayTruyVanTraVeDL($conn, $query);

$row = mysqli_fetch_row($result);
$total = ceil($row[0] / $records_per_page);

// Truy vấn id_type trong db
$query = ($id_type !== null) ? "SELECT * FROM tbl_products WHERE id_type = $id_type LIMIT $offset, $records_per_page" : "SELECT * FROM tbl_products LIMIT $offset, $records_per_page";
$result = chayTruyVanTraVeDL($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card col-lg-3 col-md-6"> 
                        <a href="product_details.php?id=' . $row['id'] . ' ">
                        <img class="larger-card-img" src="' . $row['img'] . '" alt="Card image">
                        </a>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 style="height: 60px; overflow: hidden;"><a href="product_details.php?id=' . $row['id'] . ' " class="card-title">' . $row['tenSP'] . '</a></h4>
                            <p class="card-text">' . $row['giaSP'] . ',000đ</p>
                            <div class="d-flex justify-content-around w-100">
                                <a href="#?id=' . $row['id'] . ' " class="btn-buy btn btn-success" onclick="laygiaSP(' . $row['id'] . ')">Buy</a>
                                <a href="#?id=' . $row['id'] . ' " class="btn-addtocart btn btn-success" onclick="addToCart(' . $row['id'] . ')"><i class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        </div>';
}

echo '<br style="clear:both";/>';
echo '<div class="centered-content">';
echo '<div class="paper col-sm-2">';

if ($page > 1) {
    $prevPage = ($id_type !== null) ? "?page=" . ($page - 1) . "&id_type=" . $id_type : "?page=" . ($page - 1);
    echo '<a href="' . $prevPage . '" class="btn btn-primary">&lt; Prev</a> ';
}

for ($i = 1; $i <= $total; $i++) {
    $class = ($i == $page) ? 'btn-primary' : 'btn-secondary';
    $pageLink = ($id_type !== null) ? "?page=$i&id_type=$id_type" : "?page=$i";
    echo "<button class='btn $class' onclick='window.location.href=\"$pageLink\"'>$i</button> ";
}

if ($page < $total) {
    $nextPage = ($id_type !== null) ? "?page=" . ($page + 1) . "&id_type=" . $id_type : "?page=" . ($page + 1);
    echo '<a href="' . $nextPage . '" class="btn btn-primary">Next &gt;</a> ';
}

echo '</div>';
echo '</div>';
?>
<style>
    .paper {
        background-color: darkgray;
        padding: 10px;
        text-align: center;
        margin-left: 5px;
        word-spacing: 10px;
        width: 100%;
    }

    .centered-content {
        text-align: center;
    }
</style>
