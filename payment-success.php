<?php
$product = $_POST['product_name'] ?? 'Unknown';
$price = $_POST['price'] ?? '0.00';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Success</title>
  <style>
    body {
      font-family: Arial;
      background: #e0ffe0;
      text-align: center;
      padding: 50px;
    }

    .box {
      background: white;
      display: inline-block;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
    }

    h2 {
      color: green;
    }

    p {
      font-size: 18px;
      margin: 10px 0;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #654321;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }

    .btn:hover {
      background: #543210;
    }
  </style>
</head>
<body>

<div class="box">
  <h2>Payment Successful!</h2>
  <p>Thank you for purchasing <strong><?= htmlspecialchars($product) ?></strong></p>
  <p>Amount Paid: ₹<?= htmlspecialchars($price) ?></p>
  <a href="index.html" class="btn">Back to Home</a>
</div>

</body>
</html>
