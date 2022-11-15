<?php

include "../controllers/connect.php";
include "../admin/products/validateAdmin.php";


if (isset($_POST['add'])) {
    $namaProduk = $_POST['nama_produk'];
    $deskripsiProduk = $_POST['deskripsi_produk'];
    $kategori = $_POST['kategori'];
    $gambarProduk = $_FILES['gambar_produk'];
    $hargaProduk = $_POST['harga_produk'];


    $dirName = pathinfo($gambarProduk['name'])['dirname'];
    $ext = pathinfo($gambarProduk['name'])['extension'];
    $path = "$dirName$ext";
    $fileNameNew = time() . strtolower($path);

    move_uploaded_file($gambarProduk['tmp_name'], "../images/$fileNameNew");

    postProduct("products", $namaProduk, $hargaProduk, $deskripsiProduk, $kategori, $fileNameNew, $id);
    $kategori = strtolower($kategori);
    $kategori = str_replace(' ', '', $kategori);
    header("Location:../admin/products/$kategori");
}
