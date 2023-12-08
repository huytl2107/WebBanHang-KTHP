<?php
// Include file connect.php to use the existing connection
include('config.php');

function chayTruyVanTraVeDL($conn, $q)
{
    $result = mysqli_query($conn, $q);

    // Check if the query was successful
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    return $result;
}

function chayTruyVanKhongTraVeDL($conn, $q)
{
    $result = mysqli_query($conn, $q);

    // Check if the query was successful
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    return $result;
}

function giaiPhongBoNho($conn, $result)
{
    try {
        mysqli_close($conn);
        mysqli_free_result($result);
    } catch (TypeError $e) {
    }
}
?>