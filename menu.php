<?php
// Include file connection.php to use the functions

$result = chayTruyVanTraVeDL($conn, "select * from tbl_products_types");
while($rows = mysqli_fetch_assoc($result)){
    echo "<a href='?dm=".$rows['id_type']."' class='btn btn-link'>".$rows['name_type']."</a>";
}
?>
