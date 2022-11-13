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

    if (empty($password)) {
        $err = "Masukkan Password Terlebih Dahulu";
        header('location:../auth/login?err=' . $err);
        exit;
    }

    if ($username !== $result['username']) {
        $err = "Username Tidak Ditemukan";
        header('location:../auth/login?err=' . $err);
        exit;
    }

    if (mysqli_num_rows($count) === 1) {
        $validate = password_verify($password, $result['password']);

        // Cek Password
        if ($validate) {
            if ($result['role'] === 'admin') {
                $_SESSION['login'] = true;
                $_SESSION['role'] = 'admin';
                header("location:../admin/");
            } else {
                $_SESSION['login'] = true;
                $_SESSION['role'] = 'user';
                header("location:../");
            }
        } else {
            $err .= "Password Yang Anda Masukkan Salah";
            header('location:../auth/login?err=' . $err);
            exit;
        }
    }
}
