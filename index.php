<!DOCTYPE html>
<html lang="en">


<?php
$title = "Home";
include "./utilities/header-title.php";
include "./utilities/header-links.php";

// Fetch From Database
include "controllers/connect.php";
$resultProduk = showAll('products');
$resultKategori = showAll('category');
?>

<body>
    <?php
    include "components/navbarHome.php"
    ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bold">Shop your style</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    Feel Authentic and Be Yourself
                </p>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Section Start -->
    <section class="py-3">
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="my-5 text-center">Discover</h1>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while ($produk = mysqli_fetch_array($resultProduk)) : ?>
                    <div class="col mb-5">
                        <a href="collections/products?variant=<?= $produk['id_produk'] ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm rounded-3">
                                <!-- Product image-->
                                <img class="card-img-top" src="images/<?= $produk['gambar_produk'] ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="">
                                        <!-- Product name-->
                                        <h5 class=""><?= $produk['nama_produk']  ?></h5>
                                        <!-- Product price-->
                                        <div class="text-info">Rp. <?= number_format($produk['harga_produk']) ?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </section>
    <!-- Section End -->

    <!-- Category Start -->
    <div class="container py-3">
        <h1 class="text-center">Category</h1>
        <div class="row row-cols-4 py-5 justify-content-center">
            <?php while ($rowKategori = mysqli_fetch_array($resultKategori)) : ?>
                <div class="card mb-5 mx-4 p-2 shadow-sm border-0" style="cursor: pointer;">
                    <img src="images/img-placeholder (1).png" alt="" class="card-img" />
                    <div class="card-img-overlay d-flex justify-content-center align-items-center">
                        <div class="card-title fw-bold fs-1 text-white"><?= $rowKategori['kategori'] ?></div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
    <!-- Category End -->

    <?php
    include "components/footer.php"
    ?>
</body>

</html>