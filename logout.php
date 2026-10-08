<?php
// I, Kaley Santonocito, certify that this submission is my own original work.

session_start();

session_unset();

session_destroy();

header("Location: login.php");
exit();
?>