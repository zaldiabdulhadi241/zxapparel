<?php
include "../../validateAdmin.php";
include "../../../../controllers/connect.php";
$result = show("products", "id_user = '$id'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zx Apparel - Edit Produk</title>
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../../style/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/92b154d120.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-3">
        <h1 class="mb-3">Edit Produk</h1>
        <form action="../../../../controllers/editproduct.php?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">

            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control my-2" name="nama_produk" placeholder="<?= $row['nama_produk'] ?>">

            <label for="deskripsi_produk">Deskripsi Produk</label>
            <input type="text" class="form-control my-2" name="deskripsi_produk" placeholder="<?= $row['deskripsi_produk'] ?>">

            <label for="kategori">Kategori</i></label>
            <select name="kategori" class=" form-control my-2">
                <option value="T-Shirts">T-Shirts</option>
                <option value="Hoodies">Hoodies</option>
                <option value="Pants">Pants</option>
                <option value="Tote Bag">Tote Bag</option>
                <option value="Accesories">Accesories</option>
            </select>

            <div class="">
                <img src="../../../../images/<?= $row['gambar_produk'] ?>" class="my-3" alt="" width="120px">
                <label for="gambar_produk">Gambar Produk</label>
                <input type="file" name="gambar_produk" accept="image/*" class="form-control my-2">
            </div>

            <label for="harga_produk">Harga</label>
            <input type="text" placeholder="Rp. <?= number_format($row['harga_produk']) ?>" name="harga_produk" class="form-control my-2 mb-4">

            <button type="submit" name="edit" class="btn btn-primary w-100">Edit</button>
        </form>
    </div>
</body>

</html>