<?php
// I, Kaley Santonocito, certify that this submission is my own original work.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <link rel="stylesheet" href="style.css">

    <script>
    function validate(form)
{
    fail = ""

    if (form.username.value == "")
        fail += "No username was entered.\n"

    if (form.email.value == "")
        fail += "No email was entered.\n"

    if (form.password.value.length < 6)
        fail += "Password must be at least 6 characters.\n"

    if (form.password.value != form.confirm_password.value)
        fail += "Passwords do not match.\n"

    if (fail == "")
        return true
    else {
        alert(fail)
        return false
    }
}
</script>
</head>

<body>

<h1>Create Hogwarts Account</h1>

<form method="post" action="registerUser.php" onsubmit="return validate(this)">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Confirm Password:</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <input type="submit" value="Register">

</form>

<br>

<a href="login.php">Already have an account? Login here</a>

</body>
</html>