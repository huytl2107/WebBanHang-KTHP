<?php

    $result = chayTruyVanTraVeDL($conn, "select * from tbl_products_types");
    while($rows = mysqli_fetch_assoc($result)){
        echo "<a href='?id_type=".$rows['id_type']."' class='btn btn-link'>".$rows['name_type']."</a>";
    }
?>
