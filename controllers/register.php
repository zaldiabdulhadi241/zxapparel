<?php
include "connect.php";

session_start();



$err = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

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
        $_SESSION['login'] = true;
        header("location:../index.php");
        exit;
    } else {
        $err .= "Username Telah Digunakan";
        header('location:../auth/register?err=' . $err);
        exit;
    }
}
