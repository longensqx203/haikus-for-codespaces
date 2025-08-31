<?php
// logout.php
session_start();
session_unset();   // Xoá toàn bộ biến session
session_destroy(); // Hủy session

// Quay về login.php
header("Location: login.php");
exit();
?>
