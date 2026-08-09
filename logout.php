<?php
session_start();
//hapus semua session
unset($_SESSION["name"]);

//redirect ke halaman login.php
header("location:login.php");
?>