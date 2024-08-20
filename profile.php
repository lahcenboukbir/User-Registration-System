<?php
// Start a session to access session variables
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit;
}

// Display a logout button that links to the logout page
echo '<button><a href="logout.php">Logout</a></button>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <h1>Profile</h1>
    <!-- Display a welcome message with the username from the session -->
    <h4>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>.</h4>
</body>

</html>
