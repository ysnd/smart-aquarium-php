<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/fish.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <title>Dashboard | SmartFishTank</title>
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
        <li><a class="active" href="dashboard.php"><img src="images/dashboard.png" alt="Aquarium Dashboard"> Dashboard</a></li>
        <li><a href="data.php"><img src="images/chart.png" alt="Aquarium Data">Data</a></li>
        <li><a href="about.php"><img src="images/about.png" alt="About Us">About</a></li>
    </ul>
    <div class="isi" id="isi">
      <br><br>
    <h1 style="color: #31304D;"> Overview </h1>  
        <div class="dashboard-content">
            <div class="dashboard-card">
                <h3 class="temperatureColor"><i class="fas fa-thermometer-half"></i> TEMPERATURE</h3>
                <p class="temperatureColor"><span class="reading" style="font-size:44px;"><span id="ESP32_01_Temp">NN</span> &deg;C</span></p>
                <p class="statusreadColor"><span>Status Read Sensor  : </span><span id="ESP32_01_Status_Read">NN</span></p>
            </div>
            <div class="dashboard-card">
                <h3 class="heaterStatus"><i class="fa fa-fire"></i> HEATER STATUS</h3>
                <p class="heaterStatus"><span class="reading" style="font-size:55px;"><span id="ESP32_01_StatHeat">NN</span></span></p>
                <p class="heaterStatus"> </p>
            </div>
            <div class="dashboard-card">
                <h3 class="lightStatus"><i class="fas fa-lightbulb"></i> LIGHT STATUS</h3>
                <p class="lightStatus"><span class="reading" style="font-size:55px;"><span id="ESP32_01_StatLamp">NN</span></span></p>
                <p class="lightStatus"></p>
            </div>
        </div>
        <h1 style="color: #31304D;"> Control Panel</h1>   
        <div class="dashboard-panel">
        <div class="row1">
            <div class="dashboard-card1">
                <h3 class="light"><i class="fas fa-lightbulb"></i> LIGHT</h3>
                <label class="switch">
                <input type="checkbox" id="ESP32_01_TogLAMP" onclick="GetTogBtnLEDState('ESP32_01_TogLAMP')">
                <div class="sliderTS"></div>
                </label>
            </div>
            <div class="dashboard-card1">
              <h3 class="pakan"><i class="fas fa-utensils"></i> FEED</h3>
              <label class="switch">
              <input type="checkbox" id="ESP32_01_TogPAKAN" onclick="togglePakan()">
              <div class="sliderTS"></div>
              </label>
            </div>
            <div class="dashboard-card1">
                <h3 class="light"><i class="fa fa-fire"></i> HEATER</h3>
                <label class="switch">
                <input type="checkbox" id="ESP32_01_TogHEATER" onclick="GetTogBtnLEDState('ESP32_01_TogHEATER')">
                <div class="sliderTS"></div>
                </label>
            </div>
          </div>
          <div class="row2">
            <div class="dashboard-threshold">
              <form id="login-form">
              <h3 class="threshold"><i class="fas fa-wind"></i> Thresholds</h3>
                <i class="fas fa-snowflake"></i><label for="low_threshold"> Low Threshold [&deg;C]: </label>
                <input type="number" id="low_threshold" placeholder="Enter low threshold">
                <br><span id="current_thresholds">Current : <span id="current_low_threshold">NN</span>&deg;C</span>
                <br><br><i class="fas fa-fire-alt"></i><label for="high_threshold"> High Threshold [&deg;C]: </label>
                <input type="number" id="high_threshold" placeholder="Enter high threshold">
                <br><span id="current_thresholds">Current : <span id="current_high_threshold">NN</span>&deg;C</span>
                <br><br><button type="button" onclick="setThresholds()">Set Thresholds</button>
                <br><br><span id="threshold_status"></span>
              </form>
          </div>   
        </div>
          </div>
        <div class="dashboard-content">
            <h3 style="font-size: 0.8rem; color: #161A30;">LAST TIME RECEIVED DATA FROM ESP32 [ <i class="fas fa-clock"></i> <span id="ESP32_01_LTRD"></span> <i class="fas fa-calendar-alt"></i> ]</h3>
        </div>
    </div>
    <script>
      document.getElementById("ESP32_01_Temp").innerHTML = "NN"; 
      document.getElementById("ESP32_01_Status_Read").innerHTML = "NN";
      document.getElementById("ESP32_01_LTRD").innerHTML = "NN";
      document.getElementById("ESP32_01_StatLamp").innerHTML = "NN"; 
      document.getElementById("ESP32_01_StatHeat").innerHTML = "NN";
      document.getElementById("current_low_threshold").innerHTML = "NN";
      document.getElementById("current_high_threshold").innerHTML = "NN";
 

      Get_Data("ESP32_1");
      
      setInterval(myTimer, 5000);
      
      function myTimer() {
        Get_Data("ESP32_1");
      }

      function Get_Data(id) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            const myObj = JSON.parse(this.responseText);
            if (myObj.id == "ESP32_1") {
              document.getElementById("ESP32_01_Temp").innerHTML = myObj.suhu;
              document.getElementById("ESP32_01_Status_Read").innerHTML = myObj.status_baca_suhu;
              document.getElementById("current_low_threshold").innerHTML = myObj.low_threshold;
              document.getElementById("current_high_threshold").innerHTML = myObj.high_threshold;
              document.getElementById("ESP32_01_LTRD").innerHTML = "Time : " + myObj.ls_time + " | Date : " + myObj.ls_date;
              if (myObj.lampu == "ON") {
                document.getElementById("ESP32_01_TogLAMP").checked = true;
                document.getElementById("ESP32_01_StatLamp").innerHTML = "ON";
              } else if (myObj.lampu == "OFF") {
                document.getElementById("ESP32_01_TogLAMP").checked = false;
                document.getElementById("ESP32_01_StatLamp").innerHTML = "OFF";
              }
              if (myObj.heater == "ON") {
                document.getElementById("ESP32_01_TogHEATER").checked = true;
                document.getElementById("ESP32_01_StatHeat").innerHTML = "ON";
              } else if (myObj.heater == "OFF") {
                document.getElementById("ESP32_01_TogHEATER").checked = false;
                document.getElementById("ESP32_01_StatHeat").innerHTML = "OFF";
              }
               // Control Heater based on Thresholds
               var currentTemperature = parseFloat(myObj.suhu);
                var lowThreshold = parseFloat(myObj.low_threshold);
                var highThreshold = parseFloat(myObj.high_threshold);

                if (!isNaN(currentTemperature) && !isNaN(lowThreshold) && !isNaN(highThreshold)) {
                    if (currentTemperature < lowThreshold) {
                        // If temperature is below low threshold, turn ON Heater
                        Update_LEDs("ESP32_1", "heater", "ON");
                    } else if (currentTemperature > highThreshold) {
                        // If temperature is above high threshold, turn OFF Heater
                        Update_LEDs("ESP32_1", "heater", "OFF");
                    }
                }
            }
          }
        };
        xmlhttp.open("POST","getdata.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
			}

      function GetTogBtnLEDState(togbtnid) {
        if (togbtnid == "ESP32_01_TogLAMP") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("ESP32_1","lampu",togbtncheckedsend);
        }
        if (togbtnid == "ESP32_01_TogHEATER") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("ESP32_1","heater",togbtncheckedsend);
        }
      }
      function togglePakan() {
  var pakanCheckbox = document.getElementById("ESP32_01_TogPAKAN");
  var pakanState = (pakanCheckbox.checked) ? "ON" : "OFF";
  Update_LEDs("ESP32_1", "pakan", pakanState);

  // Menonaktifkan kembali checkbox setelah memberikan pakan
  pakanCheckbox.disabled = true;

  // Menjalankan fungsi untuk mengaktifkan kembali checkbox setelah beberapa detik
  setTimeout(function () {
    pakanCheckbox.disabled = false;
    // Matikan checkbox secara otomatis setelah beberapa detik
    pakanCheckbox.checked = false;
    Update_LEDs("ESP32_1", "pakan", "OFF");
  }, 8000); // Ganti angka 5000 dengan jumlah milidetik yang diinginkan
}



      function Update_LEDs(id,ledType,ledstate) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("POST","updateLEDs.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id+"&ledType="+ledType+"&ledstate="+ledstate);
			}
  
      function setThresholds() {
        var lowThreshold = document.getElementById("low_threshold").value;
        var highThreshold = document.getElementById("high_threshold").value;

        // Validation: Check if the input values are numbers
        if (isNaN(lowThreshold) || isNaN(highThreshold)) {
            document.getElementById("threshold_status").innerHTML = "Please enter valid threshold values.";
            return;
        }

        // AJAX request to update thresholds using the existing updateLEDs.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Display the response from the server
                document.getElementById("threshold_status").innerHTML = this.responseText;
            }
          };
        xhttp.open("POST", "updateThresholds.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("low_threshold=" + lowThreshold + "&high_threshold=" + highThreshold);
    }
    </script>
    <script src="script.js"></script>
</body>
</html>
