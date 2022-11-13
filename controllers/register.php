<?php
include "connect.php";

session_start();

$err = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    if (empty($_POST['adminCheck'])) {
        $role = 'user';
    } else {
        $role = $_POST['adminCheck'];
    }

    if (empty($email)) {
        $err .= "Masukkan Email Terlebih Dahulu";
        header('location:../auth/register?err=' . $err);
        exit;
    }


    if (empty($username)) {
        $err .= "Masukkan Username Terlebih Dahulu";
        header('location:../auth/register?err=' . $err);
        exit;
    }

    if (empty($password)) {
        $err .= "Masukkan Password Terlebih Dahulu";
        header('location:../auth/register?err=' . $err);
        exit;
    }

    if ($password != $confirmPassword) {
        $err .= "Password Tidak Sesuai";
        header('location:../auth/register?err=' . $err);
        exit;
    }

    $email = mysqli_real_escape_string($koneksi, strtolower($email));
    $username = mysqli_real_escape_string($koneksi, strtolower($username));
    $password = mysqli_real_escape_string($koneksi, password_hash($password, PASSWORD_BCRYPT));
    $confirmPassword = mysqli_real_escape_string($koneksi, password_hash($confirmPassword, PASSWORD_BCRYPT));
    $result = mysqli_fetch_array(show("users", "username = '$username'"));


    if ($email === $result['email']) {
        $err .= "Email Telah Digunakan";
        header('location:../auth/register?err=' . $err);
        exit;
    }

    if (empty($result['username'])) {
        postRegister('users', $username, $email, $password, $confirmPassword, $role);
        if ($role === 'admin') {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'admin';
            header("location:../admin/");
        } else {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'user';
            header("location:../");
        }
        exit;
    } else {
        $err .= "Username Telah Digunakan";
        header('location:../auth/register?err=' . $err);
        exit;
    }
}
