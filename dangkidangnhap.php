<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thực Đơn - Sasin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    header {
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 10px 0;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 25px;
      padding: 0;
      margin: 0;
    }

    nav ul li {
      display: inline;
    }

    nav ul li a {
      text-decoration: none;
      font-weight: bold;
      color: #333;
      padding: 8px 12px;
      border-radius: 5px;
      transition: background-color 0.3s, color 0.3s;
    }

    nav ul li a:hover,
    nav ul li a:focus {
      background-color: #b91c1c;
      color: #fff;
    }

    h1 {
      text-align: center;
      color: #b91c1c;
      padding-top: 20px;
    }

    .menu-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .menu-item {
      background-color: #fff;
      border: 1px dashed #ccc;
      padding: 15px;
      text-align: center;
      border-radius: 8px;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .menu-item:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-field {
      width: 90%;
      padding: 8px;
      margin: 5px 0;
    }

    .form-button {
      padding: 10px 20px;
      background-color: #b91c1c;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .error-message {
      color: red;
      margin-top: 10px;
    }

    .success-message {
      color: green;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="homedangki.html">Trang chủ</a></li>
      <li><a href="thucdon.html">Thực đơn</a></li>
      <li><a href="uudai.html">Ưu đãi</a></li>
      <li><a href="tuyendung.html">Tuyển dụng</a></li>
      <li><a href="#nhuongquyen">Nhượng quyền</a></li>
      <li><a href="https://www.facebook.com/iaht109/">Sasin Shop</a></li>
      <li><a href="lienhe.html">Liên hệ</a></li>
      <li><a href="#dangki">Đăng kí</a></li>
      <a class="lang">ENG</a>
    </ul>
  </nav>
</header>

<h1 id="dangnhap">Đăng nhập / Đăng ký</h1>

<div class="menu-container">
  <div class="menu-item">
    <h3>Đăng nhập</h3>

    <?php if (isset($_SESSION['login_error'])): ?>
  <p class="error-message"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
<?php endif; ?>

    <form action="login.php" method="POST">
      <input class="form-field" type="text" name="username" placeholder="Tên đăng nhập" required><br>
      <input class="form-field" type="password" name="password" placeholder="Mật khẩu" required> <br>
      <button class="form-button" type="submit">Đăng nhập</button>
    </form>
  </div>
  
  <?php
  if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'login.php') !== false) {
    if (isset($_SESSION['login_error'])) {
      echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
      unset($_SESSION['login_error']);
    }
  }
  ?>
  
  

  <div class="menu-item">
    <h3>Đăng ký</h3>

    <?php if (isset($_SESSION['error'])): ?>
  <p class="error-message"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <p class="success-message"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
<?php endif; ?>


    <form action="register.php" method="POST">
      <input class="form-field" name="fullname" type="text" placeholder="Họ và tên" required /><br />
      <input class="form-field" name="email" type="email" placeholder="Email" required /><br />
      <input class="form-field" name="username" type="text" placeholder="Tên đăng nhập" required /><br />
      <input class="form-field" name="password" type="password" placeholder="Mật khẩu" required /><br />
      <button type="submit" class="form-button">Đăng ký</button>
    </form>
  </div>
</div>

</body>
</html>
