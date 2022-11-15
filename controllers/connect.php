<?php
$dbname = "zxapparel";
$koneksi = mysqli_connect('localhost', 'root', '', $dbname);



function show($tableName, $where)
{
    global $koneksi;
    $query = "SELECT * FROM $tableName WHERE $where";
    $result = mysqli_query($koneksi, $query);

    return $result;
}

function showAll($tableName)
{
    global $koneksi;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($koneksi, $query);

    return $result;
}

function postRegister($tableName, $username, $email, $password, $confirmPassword, $role)
{
    global $koneksi;
    $id = time() % 10000;
    $query = "INSERT INTO $tableName(`id_user`, `username`, `email`, `password`, `confirm_password`, `role`) VALUES ('$id','$username','$email','$password','$confirmPassword','$role')";

    $result = mysqli_query($koneksi, $query);
    return $result;
}

function postProduct($tableName, $nama_produk, $harga_produk, $deskripsi_produk, $kategori, $gambar_produk, $id_user)
{
    global $koneksi;
    $id = time() % 10000;
    $query = "INSERT INTO `$tableName`(`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `kategori`, `id_user`) VALUES ($id,'$nama_produk','$harga_produk','$deskripsi_produk','$gambar_produk','$kategori','$id_user')";

    $result = mysqli_query($koneksi, $query);
    return $result;
}

function editProduct($tableName, $nama_produk, $harga_produk, $deskripsi_produk, $gambar_produk, $kategori, $where)
{
    global $koneksi;
    $query = "UPDATE `$tableName` SET `nama_produk`='$nama_produk',`harga_produk`='$harga_produk',`deskripsi_produk`='$deskripsi_produk',`gambar_produk`='$gambar_produk',`kategori`='$kategori' WHERE $where";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function delete($tableName, $where)
{
    global $koneksi;
    $query = "DELETE FROM `$tableName` WHERE $where";
    $result = mysqli_query($koneksi, $query);
    return $result;
}
