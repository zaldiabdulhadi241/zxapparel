<?php
session_start();
if ($_SESSION['role'] === 'user') {
    header("location:../../");
}
