<?php
include "../validateAdmin.php";
include "../../../controllers/connect.php";
$result = show('products', "kategori='T-Shirt'");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zx Apparel - T-Shirt</title>

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Font Aweasome & Ionicons -->
    <script src="https://kit.fontawesome.com/92b154d120.js" crossorigin="anonymous"></script>


</head>

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
                    <h1 class="h3 mb-2 text-gray-800 py-4">T - Shirts</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dashboard T - Shirts</h6>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                                            <tr>
                                                <td><?= $row['id_produk'] ?></td>
                                                <td><img src="../../../images/<?= $row['gambar_produk'] ?>" width="120px"></td>
                                                <td><?= $row['nama_produk'] ?></td>
                                                <td>Rp. <?= number_format($row['harga_produk']) ?></td>
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zx Apparel 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

</body>

</html>