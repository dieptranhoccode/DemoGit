<?php
session_start();
require 'db.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Kiểm tra xem username hoặc email đã tồn tại
$check_sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    $_SESSION['error'] = "Tài khoản của bạn đã được đăng ký!";
    header("Location: dangkidangnhap.php");
    exit();
} else {
    $insert_sql = "INSERT INTO users (fullname, email, username, password)
                   VALUES ('$fullname', '$email', '$username', '$password')";
    if ($conn->query($insert_sql) === TRUE) {
        $_SESSION['success'] = "Đăng ký thành công!";
        header("Location: dangkidangnhap.php");
        exit();
    } else {
        $_SESSION['error'] = "Lỗi khi đăng ký. Vui lòng thử lại!";
        header("Location: dangkidangnhap.php");
        exit();
    }
}

$conn->close();
?>
