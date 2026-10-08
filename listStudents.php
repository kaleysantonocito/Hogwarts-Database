<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';

$query = "SELECT * FROM students";
$result = $conn->query($query);

if (!$result) {
    die("Database access failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hogwarts Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hogwarts Student Registry</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>House</th>
            <th>Year</th>
            <th>Blood Status</th>
            <th>Patronus</th>
        </tr>

    <?php
    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $row = $result->fetch_assoc();

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
    ?>

    </table>

    <br>
    <a href = "mainMenu.php">Back to Main Menu</a>

</body>
</html>