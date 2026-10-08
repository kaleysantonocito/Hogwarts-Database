<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';

if (isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['house']) &&
    isset($_POST['year']) &&
    isset($_POST['blood_status']) &&
    isset($_POST['patronus'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house = $_POST['house'];
    $year = $_POST['year'];
    $blood_status = $_POST['blood_status'];
    $patronus = $_POST['patronus'];

    $query = "INSERT INTO students (first_name, last_name, house, year, blood_status, patronus) VALUES ('$first_name', '$last_name', '$house', '$year', '$blood_status', '$patronus')";

    $result = $conn->query($query);

    if (!$result) {
        die("Insert failed: " . $conn->error);
    } else {
        echo "Student added successfully!";
    }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Enroll a New Student</h1>

    <form method="post" action="addStudents.php">
        <label>First Name:</label>
        <input type="text" name="first_name" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required><br><br>

        <label>House:</label>
        <input type="text" name="house" required><br><br>

        <label>Year:</label>
        <input type="number" name="year" required><br><br>

        <label>Blood Status:</label>
        <input type="text" name="blood_status" required><br><br>

        <label>Patronus:</label>
        <input type="text" name="patronus" required><br><br>

        <input type="submit" value="Add Student">
    </form>

    <br>
    <a href = "mainMenu.php">Back to Main Menu</a>
</body>
</html>
   