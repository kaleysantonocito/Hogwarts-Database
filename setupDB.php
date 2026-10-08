<?php
// I, Kaley Santonocito, certify that this submission is my own original work.

$host = "localhost";
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$dbname = "hogwarts_db";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.";
} else {
    die("Error creating database: " . $conn->error);
}

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    house VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    blood_status VARCHAR(50) NOT NULL,
    patronus VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'students' created successfully or already exists.";
} else {
    die("Error creating table: " . $conn->error);
}

$sql = "INSERT INTO students (first_name, last_name, house, year, blood_status, patronus) VALUES
    ('Harry', 'Potter', 'Gryffindor', 5, 'Half-blood', 'Stag'),
    ('Hermione', 'Granger', 'Gryffindor', 5, 'Muggle-born', 'Otter'),
    ('Ron', 'Weasley', 'Gryffindor', 5, 'Pure-blood', 'Jack Russell Terrier'),
    ('Draco', 'Malfoy', 'Slytherin', 5, 'Pure-blood', 'Unknown'),
    ('Luna', 'Lovegood', 'Ravenclaw', 5, 'Pure-blood', 'Hare'),
    ('Neville', 'Longbottom', 'Gryffindor', 5, 'Pure-blood', 'Unknown'),
    ('Ginny', 'Weasley', 'Gryffindor', 5, 'Pure-blood', 'Horse'),
    ('Fred', 'Weasley', 'Gryffindor', 5, 'Pure-blood', 'Unknown'),
    ('George', 'Weasley', 'Gryffindor', 5, 'Pure-blood', 'Unknown')";

if ($conn->query($sql) === TRUE) {
    echo "Sample data inserted successfully.";
} else {
    die("Error inserting data: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(50) NOT NULL PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully or already exists.";
} else {
    die("Error creating users table: " . $conn->error);
}

$conn->close();
?>