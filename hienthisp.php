<?php
$page=isset($_GET['page'])?$_GET['page']:1;
$records_per_page=12;//số sản phẩm trên trang
$offset = ($page - 1) * $records_per_page;
$result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products");
$row = mysqli_fetch_row($result);
$total=ceil($row[0]/$records_per_page);
$result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products LIMIT $offset,$records_per_page");
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card col-lg-3 col-md-6"> 
                        <a href="product_details.php?id=' . $row['id'] . ' ">
                        <img class="larger-card-img" src="' . $row['img'] . '" alt="Card image">
                        </a>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 style="height: 60px; overflow: hidden;"><a href="product_details.php?id=' . $row['id'] . ' " class="card-title">' . $row['tenSP'] . '</a></h4>
                            <p class="card-text">' . $row['giaSP'] . 'đ</p>
                            <div class="d-flex justify-content-around w-100">
                                <a href="#" class="btn-buy btn btn-success">Buy</a>
                                <a href="#" class="btn-addtocart btn btn-success"><i class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        </div>';
}
echo'<br style="clear:both";/>';
echo' <div class="centered-content">';
echo'<div class="paper col-sm-2 ">';
for ($i = 1; $i <= $total; $i++) {
    echo "<a href='.?page=$i'><$i></a> ";}
echo'</div>';
echo'</div>';
?>
<style>
    .paper{
        background-color: yellow; padding: 10px;
        text-align: center; margin-left: 5px; word-spacing: 10px;
    }
</style>