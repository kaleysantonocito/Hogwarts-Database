<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'dblogin.php';

if (isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house = $_POST['house'];
    $year = $_POST['year'];
    $blood_status = $_POST['blood_status'];
    $patronus = $_POST['patronus'];

    $query = "UPDATE students SET
        first_name = '$first_name',
        last_name = '$last_name',
        house = '$house',
        year = '$year',
        blood_status = '$blood_status',
        patronus = '$patronus'
        WHERE student_id = '$student_id'"; 

    $result = $conn->query($query);

    if (!$result) {
        die("Update failed: " . $conn->error);
    } else {
        echo "Student information updated successfully.<br>";
    }
}

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = $conn->query($query);

    if (!$result) {
        die("Student lookup failed: " . $conn->error);
    }

    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Student Information</h1> 

<?php

if (isset($_GET['student_id']) && isset($row)) {
    ?>
    <form method="post" action="updateStudent.php">
        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br><br>

        <label>House:</label>
        <input type="text" name="house" value="<?php echo $row['house']; ?>" required><br><br>

        <label>Year:</label>
        <input type="number" name="year" value="<?php echo $row['year']; ?>" required><br><br>

        <label>Blood Status:</label>
        <input type="text" name="blood_status" value="<?php echo $row['blood_status']; ?>" required><br><br>

        <label>Patronus:</label>
        <input type="text" name="patronus" value="<?php echo $row['patronus']; ?>" required><br><br>

        <input type="submit" name="update" value="Update Student">
    </form>

<?php
} else {
    $query = "SELECT * FROM students";
    $result = $conn->query($query);

    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>House</th>
        <th>Year</th>
        <th>Blood Status</th>
        <th>Patronus</th>
        <th>Update</th>
    </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['student_id'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['house'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['blood_status'] . "</td>";
    echo "<td>" . $row['patronus'] . "</td>";
    echo "<td><a href='updateStudent.php?student_id=" . $row['student_id'] . "'>Update</a></td>"; 
    echo "</tr>";
}
echo "</table>";
}

?>

    <br>
    <a href = "mainMenu.php">Back to Main Menu</a>  
</body>
</html>