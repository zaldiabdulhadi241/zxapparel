<?php
include "connect.php";
$id = $_GET['id'];
$result = show("products", "id_produk = '$id'");
$row = mysqli_fetch_array($result);

unlink("../images/" . $row['gambar_produk']);
delete("products", "id_produk = '$id'");
header("Location:../admin/users/");
