<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "smartfishtank";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $updateSql = "UPDATE users SET name = '$name', email = '$email', dob = '$dob' WHERE id = $user_id";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/fish.png">
    <title>Dashboard | SmartFishTank</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body class="register">
    <div class="navbar" id="navbar">
        <div class="menuIcon" onclick="toggleSideNav()">☰</div>
        <div class="logo">SmartFishTank</div>
        <div class="user-info">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<div class="dropdown">';
                echo '<a href="javascript:void(0);" class="dropbtn" id="user-dropdown" data-toggle="dropdown">';
                echo '<img id="user-icon" src="images/account.png" alt="Logo Akun" /> Hi, ' . $_SESSION['user_name'] . '</a>';
                echo '<div class="dropdown-content" id="user-dropdown-content">';
                echo '<a href="profile.php">Profile</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="login.php" class="btn">';
                echo '<img id="user-icon" src="images/account.png" alt="Logo Akun" /> Login</a>';
            }
            ?>
        </div>
    </div>
    <div class="register-form">
        <h2>Edit Profile</h2>
        <h3 style="color: gray;">Hallo, <?php echo $user['name']; ?></h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($conn->query($updateSql) !== TRUE) {
                echo "<p style='color: red; text-align: center;'>Error updating data: " . $conn->error . "</p>";
            }
        }
        ?>
        <form action="profile.php" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $user['username']; ?>" disabled>
            </div>
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div>
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo $user['dob']; ?>">
            </div>
            <div>
                <input type="submit" value="Save Changes">
            </div>
        </form>
        <p style="color: green; text-align: center;"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo "Data berhasil diubah!"; } ?></p>
    </div>
    <script src="script.js"></script>
</body>
</html>

