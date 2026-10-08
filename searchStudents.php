<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';

$results = null;

if (isset($_POST['field'])&& isset($_POST['search_value'])) {
    $field = $_POST['field'];
    $search_value = $_POST['search_value'];

    $allowed_fields = ['first_name', 'last_name', 'house', 'year', 'blood_status', 'patronus'];
    
    if (in_array($field, $allowed_fields)) {

    $query = "SELECT * FROM students WHERE $field LIKE '%$search_value%'";
    $results = $conn->query($query);

    if (!$results) {
        die("Search failed: " . $conn->error);
    }
    } else {
        echo "Invalid search field.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Hogwarts Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Search Hogwarts Student Registry</h1>

    <form method = "post" action = "searchStudents.php">
        <label>Search by:</label>
        <select name = "field">
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="house">House</option>
            <option value="year">Year</option>
            <option value="blood_status">Blood Status</option>
            <option value="patronus">Patronus</option>
        </select><br><br>

        <input type="text" name="search_value">

        <input type="submit" value="Search">
    </form>

    <br>

 <?php   
 if ($results !== null) {
    if ($results->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>House</th>
            <th>Year</th>
            <th>Blood Status</th>
            <th>Patronus</th>
        </tr>";

    while ($row = $results->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['house'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['blood_status'] . "</td>";
        echo "<td>" . $row['patronus'] . "</td>";
        echo "</tr>";   
    }

    echo "</table>";
    } else {
        echo "No matching students found.";
    }
 }
    ?>

    <br>
    <a href = "mainMenu.php">Back to Main Menu</a>
</body>
</html>