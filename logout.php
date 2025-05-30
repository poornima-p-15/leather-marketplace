<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logged Out</title>
  <style>
    body {
      background-color: #fafafa;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .logout-box {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #333;
    }

    a {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #654321;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }

    a:hover {
      background-color: #543210;
    }
  </style>
</head>
<body>
  <div class="logout-box">
    <h2>You’ve been logged out successfully.</h2>
    <a href="login.html">Login Again</a>
  </div>
</body>
</html>
