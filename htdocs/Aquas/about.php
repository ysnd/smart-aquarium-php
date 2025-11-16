<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/fish.png">
    <title>About Us | SmartFishTank</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="navbar">
        <div class="menuIcon" onclick="toggleSideNav()">☰</div>
        <div class="logo"><i class="fas fa-fish"></i>  SmartFishTank</div>
        <div class="user-info">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<div class="dropdown">';
                echo '<a href="javascript:void(0);" class="dropbtn" id="user-dropdown" data-toggle="dropdown">';
                echo '<i class="far fa-user-circle"></i> Hi, ' . $_SESSION['user_name'] . '</a>';
                echo '<div class="dropdown-content" id="user-dropdown-content">';
                echo '<a href="profile.php">Profile</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="login.php" class="btn">';
                echo '<i class="far fa-user-circle"></i> Login</a>';
            }
            ?>
        </div>
    </div>

    <ul class="navsamping" id="sideNav">
        <li><a href="dashboard.php"><img src="images/dashboard.png" alt="Aquarium Dashboard"> Dashboard</a></li>
        <li><a href="data.php"><img src="images/chart.png" alt="Aquarium Data">Data</a></li>
        <li><a class="active" href="about.php"><img src="images/about.png" alt="About Us">About</a></li>
    </ul>
    <div class="content">
        <h2>About Us</h2>
        <p>Welcome to SmartFishTank, your premier destination for smart aquarium management. Our team is dedicated to bringing you cutting-edge technology to enhance the well-being of your aquatic companions.</p>
        
        <p>At SmartFishTank, we understand the unique challenges and joys of maintaining an aquarium. Our mission is to simplify and enrich the aquarium-keeping experience by providing innovative solutions that cater to the needs of both beginners and experienced hobbyists.</p>

        <p>Key Features:</p>
        <ul>
            <li>Smart Monitoring: Keep track of water parameters, temperature, and the overall health of your aquarium in real-time.</li>
            <li>Control: Control lighting, filtration, and other devices with the touch of a button.</li>
            <li>Gain insights into your aquarium's performance through advanced data.</li>
            <li>User-Friendly Interface: Our user interface is designed to be intuitive and accessible to users of all levels.</li>
        </ul>

        <p>Whether you're a seasoned aquarium enthusiast or just starting, SmartFishTank is your trusted partner in creating a thriving aquatic environment.</p>

        <h3>Our Team</h3>
        <p>Meet the passionate individuals behind SmartFishTank:</p>
        <ul>
            <li>Muhammad Raza Ilham - Founder and CEO</li>
            <li>Yusnadi Aunur Ramdhan - Chief Technology Officer</li>
            <li>Ahmad Fyzarman - Lead Product Designer</li>
        </ul>

        <p>Contact us at: info@smartfishtank.com</p>
        </div>
    <script src="script.js"></script>
</body>

</html>
