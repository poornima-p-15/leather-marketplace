<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'leather_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ads";
$result = $conn->query($sql);

if (!$result) {
  die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Leather Listings</title>
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

    h2 {
      text-align: center;
      margin-top: 30px;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      padding: 40px;
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      overflow: hidden;
      transition: 0.3s;
    }

    .card:hover {
      box-shadow: 0 0 15px #aaa;
      transform: scale(1.01);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 15px;
    }

    .card-content h3 {
      margin: 0;
    }

    .price {
      color: green;
      font-weight: bold;
      margin: 10px 0;
    }

    .btns {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .btns a {
      flex: 1;
      text-align: center;
      background: #654321;
      color: white;
      padding: 8px;
      text-decoration: none;
      border-radius: 5px;
    }

    .btns a:hover {
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

<h2>Browse Leather Products</h2>

<div class="container">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="card">
      <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Product Image">
      <div class="card-content">
        <h3><?= htmlspecialchars($row['product_name']) ?></h3>
        <p class="price">₹<?= htmlspecialchars($row['price']) ?></p>
        <div class="btns">
          <a href="product-details.php?id=<?= $row['id'] ?>">View</a>
          <a href="payment.html">Buy Now</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<footer>
  <p>&copy; 2025 Leather Marketplace</p>
</footer>

</body>
</html>
