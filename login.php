<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "company_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Check user in database
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION["user"] = $user["first_name"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>
