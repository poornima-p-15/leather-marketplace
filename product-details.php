<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'leather_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid product ID");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM ads WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
  die("Product not found");
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Details</title>
  <style>
    body {
      font-family: Arial;
      margin: 0;
      padding: 0;
      background: #f5f5f5;
    }

    nav {
      background: #333;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      margin-left: 15px;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      display: flex;
      gap: 30px;
      padding: 30px;
    }

    img {
      width: 400px;
      height: 400px;
      object-fit: cover;
      border-radius: 10px;
    }

    .details {
      flex: 1;
    }

    h2 {
      margin-top: 0;
    }

    .price {
      color: green;
      font-size: 20px;
      font-weight: bold;
      margin: 10px 0;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background: #654321;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
    }

    .btn:hover {
      background: #543210;
    }

    footer {
      background: #333;
      color: white;
      text-align: center;
      padding: 10px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<nav>
  <div>Leather Marketplace</div>
  <div>
    <a href="index.html">Home</a>
    <a href="listings.php">Listings</a>
    <a href="post-ad.html">Sell</a>
    <a href="login.html">Login</a>
  </div>
</nav>

<div class="container">
  <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="Product Image">
  <div class="details">
    <h2><?= htmlspecialchars($product['product_name']) ?></h2>
    <p class="price">₹<?= htmlspecialchars($product['price']) ?></p>
    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($product['description'])) ?></p>
    <p><strong>Seller Email:</strong> <?= htmlspecialchars($product['seller_email']) ?></p>
    <p><strong>Mobile:</strong> <?= htmlspecialchars($product['seller_mobile']) ?></p>
    <a href="payment.html" class="btn">Buy Now</a>
  </div>
</div>

<footer>
  <p>&copy; 2025 Leather Marketplace</p>
</footer>

</body>
</html>

