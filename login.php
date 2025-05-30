<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "company_db");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION["user"] = $user["first_name"];
    header("Location: index.php");
    exit();
  } else {
    echo "<script>alert('Invalid email or password.'); window.location.href='login.html';</script>";
  }
}
?>
