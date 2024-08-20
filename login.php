<?php
// Start a session to manage user authentication
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and trim input values
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $errors = [];

    // Validate input values
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // If no validation errors, check credentials
    if (empty($errors)) {
        // Load existing users from the JSON file
        $users = json_decode(file_get_contents('users.json'), true);

        // Check if the username and password match any existing user
        foreach ($users as $user) {
            if ($username === $user['username'] && $password === $user['password']) {
                // Set session variables for authenticated user
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;

                // Redirect to the profile page
                header("Location: profile.php");
                exit;
            }
        }
        
        // If no matching user is found, add an error message
        $errors[] = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>
    <!-- Login form -->
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Login"><br>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </form>

    <!-- Display errors if any -->
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>

</body>

</html>
