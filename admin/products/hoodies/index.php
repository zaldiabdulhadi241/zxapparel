<?php
include "../validateAdmin.php";


include "../../../controllers/connect.php";
$result = show('products', "kategori='Hoodies' AND id_user='$id'");

?>

<!DOCTYPE html>
<html lang="en">

<?php
$title = "Hoodies";
include "../../utilities/header.php";
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class=" sidebar-brand-text mx-3">Zx - Dashboard
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../users/">
                    <i class="fa-solid fa-user"></i>
                    <span>Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Products
            </div>

            <!-- Nav Item - T-Shirt Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../allproducts/">
                    <i class="fa-solid fa-shirt"></i>
                    <span>All Products</span>
                </a>
            </li>


            <!-- Nav Item - T-Shirt Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../t-shirts/">
                    <i class="fa-solid fa-shirt"></i>
                    <span>T-Shirt</span>
                </a>
            </li>

            <!-- Nav Item - Hoodies Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../hoodies/">
                    <i class="fa-solid fa-wrench"></i>
                    <span>Hoodies</span>
                </a>
            </li>

            <!-- Nav Item - Pants Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../pants/">
                    <i class="fa-solid fa-wrench"></i>
                    <span>Pants</span>
                </a>
            </li>
            <!-- Nav Item - Tote Bag Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../totebag/">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Tote Bag</span>
                </a>
            </li>
            <!-- Nav Item - Accesories Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../accesories/">
                    <i class="fa-solid fa-headphones"></i>
                    <span>Accesories</span>
                </a>
            </li>

            <li class="nav-item mt-5"><a href="../../../controllers/logout.php" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></a></li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 py-4"><?= $title ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dashboard <?= $title ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Produk</th>
                                            <th>Gambar Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                                            <?php
                                            $produkId = $row['id_produk'];
                                            ?>
                                            <tr>
                                                <td><?= $row['id_produk'] ?></td>
                                                <td><img src="../../../images/<?= $row['gambar_produk'] ?>" width="120px"></td>
                                                <td><?= $row['nama_produk'] ?></td>
                                                <td>Rp. <?= number_format($row['harga_produk']) ?></td>
                                                <td><a href="../manage/edit/?id=<?= $produkId ?>">Edit</a> | <a id="#card-hover" class="text-primary" onclick="confirmCheck()" style="cursor: pointer;">Delete</a></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Button -->
            <div class="w-100 d-flex position-fixed justify-content-end align-items-end" style="bottom: 40px; right: 20px;">
                <a href="../manage/addproduct/" class="btn btn-circle btn-primary btn-lg"><i class="fa-solid fa-plus"></i></a>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zx Apparel 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            <script>
                const confirmCheck = () => {
                    confirm = confirm("Yakin ingin menghapus?");
                    if (confirm) {
                        window.location.href = "../../../controllers/deleteproduct.php?id=<?php echo $produkId ?>";
                    } else {
                        window.location = "./";
                    }
                }
            </script>


</body>

</html>