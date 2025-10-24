<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'leather_db';

// Create connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productName = trim($_POST['productName']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);

    // Validate fields
    if (empty($productName) || empty($price) || empty($description) || !isset($_FILES['image'])) {
        echo "<script>alert('Please fill in all fields and upload an image.'); window.history.back();</script>";
        exit();
    }

    // Handle image upload
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageDir = 'uploads/';
    
    if (!file_exists($imageDir)) {
        mkdir($imageDir, 0777, true);
    }

    $imagePath = $imageDir . time() . '_' . basename($imageName); // Avoid overwriting

    if (!move_uploaded_file($imageTmp, $imagePath)) {
        echo "<script>alert('Failed to upload image.'); window.history.back();</script>";
        exit();
    }

    // Seller info 
    $sellerEmail = "seller@example.com";
    $sellerMobile = "9876543210";

    // Prepare statement to prevent SQL injection
    $sql = "INSERT INTO ads (product_name, price, description, image_path, seller_email, seller_mobile) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdssss", $productName, $price, $description, $imagePath, $sellerEmail, $sellerMobile);

    if ($stmt->execute()) {
        // Redirect to listings page after successful insertion
        header("Location: listings.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
