<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Truy vấn để kiểm tra username
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Kiểm tra mật khẩu
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username']; // hoặc lưu thêm ID, role, ...
        header("Location: index.html"); // Chuyển tới trang chính
        exit();
    } else {
        $_SESSION['login_error'] = "Sai tài khoản hoặc mật khẩu!";
        header("Location: dangkidangnhap.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Sai tài khoản hoặc mật khẩu!";
    header("Location: dangkidangnhap.php");
    exit();
}

$conn->close();
?>
