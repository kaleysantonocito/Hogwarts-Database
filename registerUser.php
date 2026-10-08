<?php
// I, Kaley Santonocito, certify that this submission is my own original work.

require_once 'dblogin.php';

if (isset($_POST['username']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm_password'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        die("Passwords do not match.<br><a href='register.php'>Back to Register</a>");
    }

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if (!$result) {
        die("Username check failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        die("Username already exists.<br><a href='register.php'>Back to Register</a>");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password)
              VALUES ('$username', '$email', '$password_hash')";

    $result = $conn->query($query);

    if (!$result) {
        die("Registration failed: " . $conn->error);
    } else {
        echo "Account created successfully.<br>";
        echo "<a href='login.php'>Go to Login</a>";
    }
} else {
    echo "Please complete the registration form.<br>";
    echo "<a href='register.php'>Back to Register</a>";
}

$conn->close();
?>