<?php
session_start();
$id = $_SESSION['id_user'];
if ($_SESSION['role'] === 'user') {
    header("location:../../");
}
