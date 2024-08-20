<?php
// Start a session to manage user authentication
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve and trim input values
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  $errors = [];

  // Validate input values
  if (empty($username)) {
    $errors[] = 'Username is required';
  }

  if (empty($email)) {
    $errors[] = 'Email is required.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Enter a valid email.';
  }

  if (empty($password)) {
    $errors[] = 'Password is required.';
  } elseif (strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters long.';
  }

  if ($password !== $confirm_password) {
    $errors[] = 'Passwords do not match.';
  }

  // Load existing users from the JSON file
  $users = json_decode(file_get_contents('users.json'), true);

  // Check if the username already exists
  foreach ($users as $user) {
    if ($user['username'] === $username) {
      $errors[] = 'Username already exists.';
      break;
    }
  }

  // If no errors, add the new user to the file and start a session
  if (empty($errors)) {
    $new_user = [
      'username' => $username,
      'email' => $email,
      'password' => $password
    ];

    $users[] = $new_user;
    file_put_contents('users.json', json_encode($users));

    // Start a session for the newly registered user
    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;

    // Redirect to the profile page
    header("Location: profile.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>

<body>

  <h1>Sign up</h1>
  <!-- Signup form -->
  <form method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username"><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email"><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br>

    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" name="confirm_password" id="confirm_password"><br>

    <input type="submit" value="Signup"><br>
    <p>Already have an account? <a href="login.php">Login</a></p>
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
