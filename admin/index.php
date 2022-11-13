<?php
session_start();
if ($_SESSION['role'] === 'admin') {
    header("location:users/");
} else {
    header("location:../");
}
