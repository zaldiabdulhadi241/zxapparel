<!DOCTYPE html>
<html lang="en">

<?php $title = "Tote Bag";
include "../../utilities/header-title.php";
include "../../controllers/connect.php";
$result = show('products', "kategori = '$title'");
?>

<body>
    <!-- Navbar -->
    <?php include "../../components/collections-navbar.php" ?>
    <!-- End Navbar -->

    <h1 class="text-center pb-3 pt-5 title fw-bold"><?php echo $title ?></h1>

    <!-- Section Start -->
    <section class="py-3">
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="my-5">Discover</h1>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while ($produk = mysqli_fetch_array($result)) : ?>
                    <div class="col mb-5">
                        <a href="../products?variant=<?= $produk['id_produk'] ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm rounded-3">
                                <!-- Product image-->
                                <img class="card-img-top" src="../../images/<?= $produk['gambar_produk'] ?>" alt="..." />
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

    <!-- Footer Start -->
    <?php
    include "../../components/footer.php";
    ?>
    <!-- Footer End -->
</body>

</html>