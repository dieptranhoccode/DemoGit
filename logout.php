<?php
session_start();
session_destroy();
header("Location: homedangki.html"); // Quay về giao diện chưa đăng nhập
exit();
?>
