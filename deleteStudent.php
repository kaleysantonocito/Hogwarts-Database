<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE student_id = '$id'";
    $result = $conn->query($query);

    if (!$result) {
        die("Delete failed: " . $conn->error);
    } else {
        echo "<p class='message'>Student deleted successfully.</p>";
    }
} 

$query = "SELECT * FROM students";
$result = $conn->query($query);

if (!$result) {
    die("Database access failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Delete Student</h1>

<table>
    <tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>House</th>
        <th>Year</th>
        <th>Blood Status</th>
        <th>Patronus</th>
        <th>Action</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['house'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['blood_status'] . "</td>";
        echo "<td>" . $row['patronus'] . "</td>";
        echo "<td>
        <a href='deleteStudent.php?id=" . $row['student_id'] . "'
           onclick=\"return confirm('Are you sure you want to delete this student?');\">
           Delete
        </a>
      </td>";
        echo "</tr>";
    }
    ?>
</table>

<br>

<a href="mainMenu.php">Back to Main Menu</a>

<?php
$conn->close();
?>

</body>
</html>