<?php
$result = chayTruyVanTraVeDL($conn, "SELECT count(*) FROM tbl_products");
$row = mysqli_fetch_row($result);
$result = chayTruyVanTraVeDL($conn, "SELECT * FROM tbl_products");

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card col-lg-3 col-md-6"> 
                        <a href="product_details.php?id=' . $row['id'] . ' ">
                        <img class="larger-card-img" src="' . $row['img'] . '" alt="Card image">
                        </a>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 style="max-height: 60px; overflow: hidden;"><a href="product_details.php" class="card-title">' . $row['tenSP'] . '</a></h4>
                            <p class="card-text">' . $row['giaSP'] . 'đ</p>
                            <div class="d-flex justify-content-around w-100">
                                <a href="#" class="btn-buy btn btn-success">Buy</a>
                                <a href="#" class="btn-addtocart btn btn-success"><i class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        </div>';
}
