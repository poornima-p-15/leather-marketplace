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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f2f2f2;
    }

    /* Navbar like index.html */
    nav {
      background-color: #654321;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    nav .logo {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
      font-size: 22px;
      color: white;
      text-decoration: none;
    }

    nav .nav-links {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    nav .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    nav .nav-links a:hover {
      color: #ffba73;
    }

    h2 {
      text-align: center;
      margin-top: 30px;
      font-family: 'Playfair Display', serif;
      color: #574144;
      font-weight: 400;
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
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      border: 1px solid #ddd;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .card img:hover {
      transform: scale(1.05);
    }

    .card-content {
      padding: 15px;
    }

    .card-content h3 {
      margin: 0 0 10px 0;
      font-size: 18px;
      color: #333;
      font-weight: 600;
    }

    .price {
      color: #28a745;
      font-weight: 600;
      margin-bottom: 10px;
      font-size: 16px;
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
      border-radius: 6px;
      font-size: 14px;
      transition: background 0.3s;
    }

    .btns a:hover {
      background: #875c3a;
    }

    /* Footer like index.html */
    footer {
      background-color: #654321;
      color: white;
      text-align: center;
      padding: 25px 20px;
      font-size: 14px;
      margin-top: 40px;
    }

    @media(max-width: 768px){
      nav {
        flex-direction: column;
        gap: 10px;
      }
      .btns {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav>
  <a href="index.html" class="logo">Leather Marketplace</a>
  <div class="nav-links">
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
  &copy; 2025 Leather Marketplace
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
