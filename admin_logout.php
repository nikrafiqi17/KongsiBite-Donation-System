<?php
session_start();

// Buang semua session
session_unset();
session_destroy();

// Kembali ke halaman login admin
header("Location: adminlogin.php");
exit();
?>