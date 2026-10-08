<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hogwarts Student Registry Main Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        
    <img src="images/Gryffindor Logo.png" class="corner top-left">
    <img src="images/Slytherin Logo.png" class="corner top-right">
    <img src="images/Ravenclaw Logo.png" class="corner bottom-left">
    <img src="images/Hufflepuff Logo.png" class="corner bottom-right">

    <div class="menu-container">

    <h1>Hogwarts Student Registry</h1>
    <h2>Main Menu</h2>

    <?php
    echo "Welcome, " . $_SESSION['username'] . "!";
    ?>

    <ul>
        <li><a href="listStudents.php">View Student List</a></li>
        <li><a href="addStudents.php">Add New Student</a></li>
        <li><a href="searchStudents.php">Search for a Student</a></li>
        <li><a href="updateStudent.php">Update Student Information</a></li>
        <li><a href="deleteStudent.php">Delete a Student</a></li>
        <li><a href="logout.php">Logout</a>
    </ul>

</div>

</body>
</html>