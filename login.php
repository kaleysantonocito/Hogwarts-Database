<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Hogwarts Student Registry</h1>
<h2>User Login</h2>

<form method="post" action="loginProcess.php">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">

</form>

<br>

<a href="register.php">Create an Account</a>

</body>
</html>