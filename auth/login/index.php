<?php
global $err;

session_start();

if (isset($_SESSION['login'])) {
    header("Location:../../");
}

if (isset($_GET['err'])) {
    $err = $_GET['err'];
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
$title = "Login";
include "../../utilities/header-title.php";
?>

<link rel="stylesheet" href="../../style/global.css" />
<link rel="stylesheet" href="../../style/bootstrap.min.css" />


<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-3 fw-bold fs-2">Login</h5>
                    <?php if ($err) {
                        echo "<li class='text-danger mb-3'>$err</li>";
                    } ?>
                    <form method="POST" action="../../controllers/login.php">
                        <input name="username" type="text" class="form-control mb-3 p-3" placeholder="Username">
                        <input name="password" type="password" class="form-control mb-3 p-3" placeholder="Password">
                        <button name="login" class="btn btn-primary btn-login text-uppercase fw-bold w-100 mb-4 mt-3 p-3 alert-handle" type="submit">Login</button>
                        <span class="text-dark text-center d-block">Don't Have an Account? <a href="../../auth/register/" class="text-primary text-decoration-none">Register here.</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>