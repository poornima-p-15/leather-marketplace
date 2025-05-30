<?php
$conn = mysqli_connect("localhost", "root", "", "company_db");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $password = $_POST["password"];

  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Email already registered!'); window.location.href='signup.html';</script>";
  } else {
    $insert = "INSERT INTO users (first_name, last_name, email, mobile, password)
               VALUES ('$first_name', '$last_name', '$email', '$mobile', '$password')";
    if (mysqli_query($conn, $insert)) {
      echo "<script>alert('Signup successful! Please log in.'); window.location.href='login.html';</script>";
    } else {
      echo "<script>alert('Signup failed!'); window.location.href='signup.html';</script>";
    }
  }
}
?>
