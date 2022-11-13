<?php
include "../../controllers/connect.php";
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
$title = "Register";
include "../../utilities/header-title.php";
?>
<link rel="stylesheet" href="../../style/global.css" />
<link rel="stylesheet" href="../../style/bootstrap.min.css" />

<body>
    <div class="container d-flex justify-content-center align-items-center overflow-hidden" style="height: 100vh;">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-bold fs-2">Register</h5>
                    <?php if ($err) {
                        echo "<li class='text-danger mb-3'>$err</li>";
                    } ?>
                    <form method="POST" action="../../controllers/register.php">
                        <input name="email" type="email" class="form-control mb-3 p-3" placeholder="Email">
                        <input name="username" type="text" class="form-control mb-3 p-3" placeholder="Username">
                        <input name="password" type="password" class="form-control mb-3 p-3" placeholder="Password">
                        <input name="confirmPassword" type="password" class="form-control mb-3 p-3" placeholder="Confirm Password">
                        <button name="register" class="btn btn-primary btn-login text-uppercase fw-bold w-100 mt-3 p-3 mb-4" type="submit">Register</button>
                        <span class="text-dark text-center d-block mb-3">Already have an account? <a href="../../auth/login/" class="text-primary text-decoration-none">Login.</a></span>
                        <div class="d-flex align-items-center justify-content-center">
                            <input type="checkbox" name="adminCheck" value="admin" class="me-2">
                            <span>Register Sebagai Admin</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>