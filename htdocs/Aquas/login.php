<?php
session_start();

// Check if cookies are enabled
if (!isset($_COOKIE)) {
  echo "Cookies are not enabled. Please enable cookies to login.";
  exit;
}

// Get the previous URL from the cookie
if (isset($_COOKIE['previous_url'])) {
  $previous_url = $_COOKIE['previous_url'];
} else {
  $previous_url = "";
}

// Check if the previous URL is valid
if (!filter_var($previous_url, FILTER_VALIDATE_URL)) {
  $previous_url = ""; // Invalid URL, redirect to home page
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "smartfishtank";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if database connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$login = "";
$password = "";

// Variables for error messages
$login_error = "";
$password_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve data from the login form
  $login = $_POST["login"];
  $password = $_POST["password"];

  // Determine if the user is logging in with email or username
  if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $login_type = "email";
  } else {
    $login_type = "username";
  }

  // SQL query to find the user based on email or username
  $sql = "SELECT id, username, password, name FROM users WHERE $login_type = ?";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $login);

    if ($stmt->execute()) {
      $stmt->store_result();

      if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $user_username, $hashed_password, $user_name);

        if ($stmt->fetch()) {
          // Verify password match
          if (password_verify($password, $hashed_password)) {
            // Password is correct, initialize session
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_username"] = $user_username;

            // Redirect to the appropriate page after successful login
            if (!empty($previous_url)) {
              // Redirect to the previous URL
              header('Location: ' . $previous_url);
            } else {
              // Redirect to the home page
              header('Location: dashboard.php');
            }
          } else {
            // Password is incorrect
            $password_error = "Invalid password. Please try again.";
          }
        } else {
          // Email or username not found
          $login_error = "Invalid email, username, or password. Please try again.";
        }
      } else {
        // No user found with the provided credentials
        $login_error = "Invalid email, username, or password. Please try again.";
      }
    } else {
      // Error executing the SQL statement
      $login_error = "Something went wrong. Please try again later.";
    }

    $stmt->close();
  }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/fish.png">
    <title>Login | SmartFishTank</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body class="login">
    <div class="login-form">
    <h1>Login</h1>
        <p>Please enter your email or username and password to login.</p>
        <form action="login.php" method="post">
            <div>
                <input type="text" placeholder="Username or Email" name="login" value="<?php echo $login; ?>">
                <span style="color: red;"><?php echo $login_error; ?></span>
            </div>
            <div>
                <input type="password" placeholder="Password" name="password">
                <span style="color: red;"><?php echo $password_error; ?></span>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
<html>