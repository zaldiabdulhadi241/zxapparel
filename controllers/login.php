<?php
include "connect.php";

session_start();


$err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $count = show("users", "username = '$username'");
    $result = mysqli_fetch_array(show("users", "username = '$username'"));

    if (empty($username)) {
        $err = "Masukkan Username Terlebih Dahulu";
        header('location:../auth/login?err=' . $err);
        exit;
    }

    if (mysqli_num_rows($count) === 1) {
        $validate = password_verify($password, $result['password']);
        // Cek Password
        if ($validate) {
            header("location:../");
            $_SESSION['login'] = true;
            exit;
        } else {
            $err .= "Password Yang Anda Masukkan Salah";
            header('location:../auth/login?err=' . $err);
            exit;
        }
    }
}
