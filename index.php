<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      text-align: center;
    }

    h1 {
      color: #333;
    }

    .btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #654321;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-size: 16px;
      cursor: pointer;
      display: inline-block;
      margin-right: 10px;
    }

    .btn:hover {
      background-color: #543210;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome back, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h1>
    <a href="index.html" class="btn">Go to Homepage</a>
    <a href="logout.php" class="btn">Logout</a>
  </div>
</body>
</html>
