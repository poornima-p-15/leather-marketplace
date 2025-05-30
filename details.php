<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'leather_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
  echo "Product not found.";
  exit;
}

$id = intval($_GET['id']);
$query = $conn->prepare("SELECT * FROM ads WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
  echo "Product not found.";
  exit;
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['product_name']) ?> - Details</title>
  <style>
    body { font-family: Arial; margin: 0; padding: 20px; background: #f0f0f0; }
    nav {
      background: #333;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
    }
    nav a { color: white; text-decoration: none; font-weight: bold; margin-left: 15px; }
    .container {
      background: #fff;
      padding: 20px;
      max-width: 600px;
      margin: 30px auto;
      border-radius: 8px;
      box-shadow: 0 0 10px #ccc;
    }
    img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 5px;
    }
    h2 { margin-top: 0; }
    a.btn {
      display: inline-block;
      padding: 10px 15px;
      background: #654321;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 10px;
    }
    a.btn:hover { background: #543210; }
    footer {
      background: #333;
      color: white;
      text-align: center;
      padding: 10px;
      margin-top: 30px;
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
  <h2><?= htmlspecialchars($product['product_name']) ?></h2>
  <p><strong>Price:</strong> ₹<?= htmlspecialchars($product['price']) ?></p>
  <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($product['description'])) ?></p>
  <p><strong>Seller Email:</strong> <?= htmlspecialchars($product['seller_email']) ?></p>
  <p><strong>Seller Mobile:</strong> <?= htmlspecialchars($product['seller_mobile']) ?></p>
  <a href="payment.html" class="btn">Buy Now</a>
  <a href="listings.php" class="btn">← Back to Listings</a>
</div>

<footer>
  <p>&copy; 2025 Leather Marketplace</p>
</footer>

</body>
</html>
