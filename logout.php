<?php
// Start a session to access session variables
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to the login page after logging out
header("Location: login.php");
exit;
?>
