<?php
include "connect.php";
$id = $_GET['id'];
$result = show("products", "id_produk = '$id'");
$row = mysqli_fetch_array($result);

if (isset($_POST['edit'])) {

    $err = "";

    $namaProduk = $_POST['nama_produk'];
    $hargaProduk = $_POST['harga_produk'];
    $deskripsiProduk = $_POST['deskripsi_produk'];
    $gambarProduk = $_FILES['gambar_produk'];
    $kategori = $_POST['kategori'];

    $oldImage = $row['gambar_produk'];
    $extOld = pathinfo($row['gambar_produk'])['extension'];
    $dirName = pathinfo($gambarProduk['name'])['dirname'];
    $ext = pathinfo($gambarProduk['name'])['extension'];
    $path = "$dirName$ext";

    if (empty($namaProduk)) {
        $namaProduk = $row['nama_produk'];
    }

    if (empty($hargaProduk)) {
        $hargaProduk = $row['harga_produk'];
    }

    if (empty($deskripsiProduk)) {
        $deskripsiProduk = $row['deskripsi_produk'];
    }


    if (isset($_FILES['gambar_produk'])) {
        $fileNameNew = time() . strtolower($path);
        move_uploaded_file($gambarProduk['tmp_name'], "../images/$fileNameNew");
        unlink("../images/" . $oldImage);
    } else {
        $fileNameNew = $oldImage;
        print_r($fileNameNew);
    }


    editProduct("products", $id, $namaProduk, $hargaProduk, $deskripsiProduk, $fileNameNew, $kategori, "id_produk = '$id'");

    strtolower($kategori);

    header("Location:../admin/products/$kategori");
}
