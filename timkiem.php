<?php
$keyword = $_POST['keyword'];
require 'db/config.php';

if(isset($_GET['keyword'])){
    $result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products WHERE tenSP LIKE '%".$_GET['keyword']."%'");
}else{
    $result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products");
}
$row = mysqli_fetch_row($result);
if(isset($_GET['keyword']))
    $result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products WHERE tenSP LIKE '%".$_GET['keyword']."%'");
else {$result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products");}
while($row=mysqli_fetch_assoc($result)){
    echo'<div class="col-sm-10">
    <div class="row">
        <div class="col-md-6">
            <img src="'.$row['img'].'" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h2>'.$row['tenSP'].'</h2>
            <p>Mô tả ngắn về sản phẩm...</p>
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>';
}
?>
