<?php
$keyword = $_POST['keyword'];
require 'db/connect.php';

if(isset($_GET['keyword'])){
    $result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products WHERE ten LIKE '%".$_GET['keyword']."%'");

    if($result) {
        while($row = mysqli_fetch_assoc($result)){
            

            echo '<div class="sanpham col-sm-10">
                    <div>
                        <h2>'.$row['ten']."'</h2>
                    </div>
                  </div>'";
        }
    } else {
        echo '<h1>Không có sản phẩm</h1>';
    }
} else {
    echo '<h1>Không có sản phẩm</h1>';
}

?>
