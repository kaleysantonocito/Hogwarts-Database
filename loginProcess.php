<?php
// I, Kaley Santonocito, certify that this submission is my own original work.

session_start();

require_once 'dblogin.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if (!$result) {
        die("Login failed: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;

            header("Location: mainMenu.php");
            exit();
        } else {
            echo "Invalid username or password.<br>";
            echo "<a href='login.php'>Back to Login</a>";
        }
    } else {
        echo "Invalid username or password.<br>";
        echo "<a href='login.php'>Back to Login</a>";
    }
} else {
    echo "Please enter a username and password.<br>";
    echo "<a href='login.php'>Back to Login</a>";
}

$conn->close();
?>