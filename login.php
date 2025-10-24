<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "leather_db"); // your DB

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        // Prepare statement to prevent SQL injection
        $stmt = mysqli_prepare($conn, "SELECT id, first_name, password FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $first_name, $hashed_password);

        if (mysqli_stmt_num_rows($stmt) === 1) {
            mysqli_stmt_fetch($stmt);
            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Correct login
                $_SESSION["user"] = $first_name;
                $_SESSION["user_id"] = $id; // optional
                header("Location: index.php");
                exit();
            } else {
                // Wrong password
                header("Location: login.html?error=invalid");
                exit();
            }
        } else {
            // Email not found
            header("Location: login.html?error=invalid");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: login.html?error=empty");
        exit();
    }

    mysqli_close($conn);
}
?>
