<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "leather_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST['productName'];
$price = $_POST['price'];
$description = $_POST['description'];

$imageName = $_FILES['image']['name'];
$tempName = $_FILES['image']['tmp_name'];
$uploadDir = "uploads/";
$uploadPath = $uploadDir . basename($imageName);

if (move_uploaded_file($tempName, $uploadPath)) {
  $sql = "INSERT INTO products (product_name, price, description, image)
          VALUES ('$productName', '$price', '$description', '$imageName')";

  if ($conn->query($sql) === TRUE) {
    header("Location: listings.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "Failed to upload image.";
}

$conn->close();
?>
