<?php
$dbname = "zxapparel";
$koneksi = mysqli_connect('localhost', 'root', '', $dbname);



function show($tableName, $where)
{
    global $koneksi;
    $query = "SELECT * FROM $tableName WHERE $where";
    $result = mysqli_query($koneksi, $query);

    return $result;
}

function showAll($tableName)
{
    global $koneksi;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($koneksi, $query);

    return $result;
}

function postRegister($tableName, $username, $email, $password, $confirmPassword, $role)
{
    global $koneksi;
    $query = "INSERT INTO $tableName(`id_user`, `username`, `email`, `password`, `confirm_password`, `role`) VALUES ('','$username','$email','$password','$confirmPassword','$role')";

    $result = mysqli_query($koneksi, $query);
    return $result;
}
