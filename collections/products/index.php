<?php
include "../../controllers/connect.php";
$id = $_GET['variant'];
$produk = mysqli_fetch_array(show("products", "id_produk=$id"));
$title = $produk['nama_produk'];
include "../../utilities/header-title.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zx Apparel - <?= $title ?></title>
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <?php include "../../components/collections-navbar.php" ?>
    <!-- End Navbar -->

    <!-- Product section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <?php
                $imageUrl = $produk['gambar_produk']
                ?>
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../../images/<?= $imageUrl ?>" /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><?= $produk['kategori'] ?></div>
                    <h1 class="display-5 fw-bolder"><?= $title ?></h1>
                    <div class="fs-5 mb-4">
                        <span class="text-decoration-line-through me-2">Rp. 399,000</span>
                        <span class="text-primary">Rp. <?= number_format($produk['harga_produk']) ?></span>
                    </div>
                    <p class="lead mb-4"><?= $produk['deskripsi_produk'] ?></p>
                    <div class="d-flex flex-column">
                        <div class="d-flex mb-4">
                            <?php
                            $qty = 1;
                            ?>
                            <span class="btn btn-outline me-3 qtyControlDecrement"> - </span>
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value=<?= $qty ?> style="max-width: 3rem" />
                            <span class="btn btn-outline me-3 qtyControlIncrement"> + </span>
                        </div>
                        <button class="btn btn-outline-dark " type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const inputQuantity = document.querySelector('#inputQuantity');
        const qtyControlDecrement = document.querySelector('.qtyControlDecrement');
        const qtyControlIncrement = document.querySelector('.qtyControlIncrement');

        qtyControlIncrement.addEventListener('click', () => {
            inputQuantity.attributes[3].value++;
        });

        qtyControlDecrement.addEventListener('click', () => {
            inputQuantity.attributes[3].value--;
            if (inputQuantity.attributes[3].value < 1) {
                inputQuantity.attributes[3].value = 1;
            }
        });
    </script>
</body>

</html>