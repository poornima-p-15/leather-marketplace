<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'leather_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST['productName'];
$price = $_POST['price'];
$description = $_POST['description'];

$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$imagePath = 'uploads/' . basename($imageName);

if (!file_exists('uploads')) {
  mkdir('uploads', 0777, true);
}

move_uploaded_file($imageTmp, $imagePath);

$sellerEmail = "seller@example.com";
$sellerMobile = "9876543210";
$sql = "INSERT INTO ads (product_name, price, description, image_path, seller_email, seller_mobile) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sdssss", $productName, $price, $description, $imagePath, $sellerEmail, $sellerMobile);

if ($stmt->execute()) {
  header("Location: listings.php");
  exit();
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
