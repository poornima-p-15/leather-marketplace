<?php
$conn = mysqli_connect("localhost", "root", "", "leather_db"); // use your DB

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name  = trim($_POST["last_name"]);
    $email      = trim($_POST["email"]);
    $mobile     = trim($_POST["mobile"]);
    $password   = trim($_POST["password"]);

    // Check if email already exists
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        // Redirect back with error flag
        header("Location: signup.html?error=email");
        exit();
    } else {
        // Hash password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert = mysqli_prepare(
            $conn,
            "INSERT INTO users (first_name, last_name, email, mobile, password) VALUES (?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($insert, "sssss", $first_name, $last_name, $email, $mobile, $hashed_password);

        if (mysqli_stmt_execute($insert)) {
            // Redirect to login page on success
            header("Location: login.html?signup=success");
            exit();
        } else {
            header("Location: signup.html?error=fail");
            exit();
        }
    }

    mysqli_stmt_close($check);
    mysqli_stmt_close($insert);
    mysqli_close($conn);
}
?>
