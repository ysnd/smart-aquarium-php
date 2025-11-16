<?php
// Inisialisasi variabel
$name = $email = $password = $dob = $confirm_password = $username = "";
$name_err = $email_err = $password_err = $dob_err = $confirm_password_err = $username_err = "";

// Konfigurasi database
$servername = "localhost";
$usernamedb = "root";
$password_db = "";
$database = "smartfishtank";

// Membuat koneksi ke database
$conn = new mysqli($servername, $usernamedb, $password_db, $database);

// Memeriksa koneksi ke database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses formulir saat data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah nama telah diisi
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Memeriksa apakah email telah diisi
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Memeriksa apakah username telah diisi
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Memeriksa apakah email sudah ada dalam database
    $sql_check_email = "SELECT id FROM users WHERE email = ?";
    if ($stmt_check_email = $conn->prepare($sql_check_email)) {
        $stmt_check_email->bind_param("s", $email);

        if ($stmt_check_email->execute()) {
            $stmt_check_email->store_result();
            if ($stmt_check_email->num_rows > 0) {
                $email_err = "This email is already registered.";
            }
        }

        $stmt_check_email->close();
    }

    // Memeriksa apakah username sudah ada dalam database
    $sql_check_username = "SELECT id FROM users WHERE username = ?";
    if ($stmt_check_username = $conn->prepare($sql_check_username)) {
        $stmt_check_username->bind_param("s", $username);

        if ($stmt_check_username->execute()) {
            $stmt_check_username->store_result();
            if ($stmt_check_username->num_rows > 0) {
                $username_err = "This username is already taken.";
            }
        }

        $stmt_check_username->close();
    }

// Memeriksa apakah password telah diisi
    if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
    } else {
    $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);
    }

// Memeriksa apakah konfirmasi password telah diisi dan sesuai
    if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm your password.";
    } elseif (empty($password_err) && (trim($_POST["password"]) != trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Password did not match.";
    }

    // Memeriksa apakah tanggal lahir telah diisi dan sesuai format
    if (empty(trim($_POST["dob"])) || strtotime(trim($_POST["dob"])) === false) {
        $dob_err = "Please enter a valid date of birth in the format YYYY-MM-DD.";
    } else {
        $dob = trim($_POST["dob"]);
    }

    // Jika tidak ada kesalahan, maka data pengguna bisa disimpan
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($dob_err) && empty($username_err)) {
        // Query SQL untuk menyimpan data pengguna ke database
        $sql = "INSERT INTO users (name, email, password, dob, username) VALUES (?, ?, ?, ?, ?)";
    
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $name, $email, $password, $dob, $username);
    
            if ($stmt->execute()) {
                // Redirect to success page
                header("Location: sukses.html");
                exit;
            } else {
                echo '<script>console.log("Something went wrong. Please try again later.");</script>';
            }
                       
        }
        // Tutup koneksi database
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | SmartFishTank</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
</head>
<body class="register">
    <div class="register-form">
    <h1>Register</h1>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $name_err; ?></span>
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $email_err; ?></span>
        </div>
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span class="error"><?php echo $username_err; ?></span>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <span class="error"><?php echo $password_err; ?></span>
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            <span class="error"><?php echo $confirm_password_err; ?></span>
        </div>
        <div>
            <label>Date of Birth</label>
            <input type="date" name="dob" value="<?php echo $dob; ?>">
            <span class="error"><?php echo $dob_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
