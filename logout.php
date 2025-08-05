<?php
session_start();
session_destroy();
header("Location: dangki.html"); // Quay về giao diện chưa đăng nhập
exit();
?>
