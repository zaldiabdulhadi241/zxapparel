<?php
session_start();
?>

<!-- Links -->
<link rel="stylesheet" href="../../style/pages-title.css">

<script src="https://kit.fontawesome.com/92b154d120.js" crossorigin="anonymous"></script>

<!-- Navigation Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="../../">
            <img src="../../images/brand-logo-white.png" style="width: 150px" />
        </a>
        <div class="d-flex" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../../">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../t-shirts/">T-Shirt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../hoodies/">Hoodies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pants/">Pants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../totebag/">Tote Bag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../accesories/">Accesories</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav d-flex align-items-center">
            <?php if (!isset($_SESSION['login'])) :
            ?>
                <a href="../zxapparel/auth/login/" class="nav-link">Login</a>
                <span class="nav-link disabled">|</span>
                <a href="../zxapparel/auth/register/" class="nav-link">Register</a>
            <?php else : ?>
                <a href="" class="nav-link"><i class="fa-solid fa-cart-shopping text-white"></i></a>
                <a href="../../controllers/logout.php" class="nav-link">Logout</a>
            <?php endif ?>
        </div>
    </div>
</nav>
<!-- Navigation End -->