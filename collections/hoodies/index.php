<!DOCTYPE html>
<html lang="en">

<?php $title = "Hoodies";
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
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <div class="col mb-5">
                        <div class="card h-100 border-0 shadow-sm rounded-3 cursor-pointer">
                            <!-- Product image-->
                            <img class="card-img-top" src="../../images/<?= $row['gambar_produk'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <!-- Product name-->
                                <h5><?= $row['nama_produk'] ?></h5>
                                <!-- Product price-->
                                <div class="text-info">Rp. <?= number_format($row['harga_produk']) ?></div>
                            </div>
                        </div>
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