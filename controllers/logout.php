<?php
session_start();

echo "<script>const logout = confirm('Tes')</script>";

$_SESSION = [];
session_unset();
session_destroy();

header("Location:../auth/login/");
