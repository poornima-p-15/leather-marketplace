<?php

$method = $_POST['method'] ?? 'unknown';

// Collect UPI or Card details
$cardname = $_POST['cardname'] ?? '';
$upiid = $_POST['upiid'] ?? '';

$paidBy = ($method === 'card') ? $cardname : $upiid;
$paidLabel = ($method === 'card') ? 'Paid by' : 'UPI ID';
$methodLabel = strtoupper($method);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Success</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
      padding: 40px;
    }

    .box {
      max-width: 500px;
      margin: auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      color: green;
      margin-bottom: 20px;
    }

    p {
      font-size: 16px;
      margin: 15px 0;
    }

    .label {
      font-weight: bold;
      color: #333;
    }

    .btn-home {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 20px;
      background-color: #4b2e10;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .btn-home:hover {
      background-color: #3d240c;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Payment Successful!</h2>
    <p><span class="label">Payment Method:</span> <?= htmlspecialchars($methodLabel) ?></p>
    <p><span class="label"><?= $paidLabel ?>:</span> <?= htmlspecialchars($paidBy) ?></p>
    
    <a href="index.html" class="btn-home">Go to Home Page</a>
  </div>
</body>
</html>
