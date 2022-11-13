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
</head>

<body>
    <!-- Navbar -->
    <?php include "../../components/collections-navbar.php" ?>
    <!-- End Navbar -->

    <!-- Product section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x500/dee2e6/6c757d.jpg" /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><?= $produk['kategori'] ?></div>
                    <h1 class="display-5 fw-bolder"><?= $title ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through me-2">Rp. 399,000</span>
                        <span class="text-primary">Rp. <?= number_format($produk['harga_produk']) ?></span>
                    </div>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                    <div class="d-flex">
                        <?php
                        $qty = 1;
                        ?>
                        <span class="btn btn-outline me-3 qtyControlIncrement"> + </span>
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value=<?= $qty ?> style="max-width: 3rem" />
                        <span class="btn btn-outline me-3 qtyControlDecrement"> - </span>
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
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