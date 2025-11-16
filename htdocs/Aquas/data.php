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
    <title>Data | SmartFishTank</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

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
        <li><a class="active" href="data.php"><img src="images/chart.png" alt="Aquarium Data">Data</a></li>
        <li><a href="about.php"><img src="images/about.png" alt="About Us">About</a></li>
    </ul>

    <div style="background-color:white;" class="isi" id="isi">
        <div class="dashboard-content">
            <h3 style="color: #161A30;">RECORD DATA TABLE</h3>

            <table class="styled-table" id="table_id">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>TEMPERATURE [°C]</th>
                        <th>STATUS READ SENSOR</th>
                        <th>LAMP</th>
                        <th>HEATER</th>
                    </tr>
                </thead>
                <tbody id="tbody_table_record">
                    <?php
                    include 'database.php';
                    $num = 0;
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM record ORDER BY date, time';
                    foreach ($pdo->query($sql) as $row) {
                        $date = date_create($row['date']);
                        $dateFormat = date_format($date, "d-m-Y");
                        $num++;
                        echo '<tr>';
                        echo '<td>' . $num . '</td>';
                        echo '<td>' . $dateFormat . '</td>';
                        echo '<td class="bdr">' . $row['time'] . '</td>';
                        echo '<td class="bdr">' . $row['suhu'] . '</td>';
                        echo '<td class="bdr">' . $row['status_baca_suhu'] . '</td>';
                        echo '<td class="bdr">' . $row['lampu'] . '</td>';
                        echo '<td class="bdr">' . $row['heater'] . '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>

            <br>

            <div class="btn-group">
                <button class="button" id="btn_prev" onclick="prevPage()">Prev</button>
                <button class="button" id="btn_next" onclick="nextPage()">Next</button>
                <div style="display: inline-block; position:relative; border: 0px solid #e3e3e3; float: center; margin-left: 2px;;">
                    <p style="position:relative; font-size: 14px; color:#161A30;"> Table : <span id="page"></span></p>
                </div>
                <select name="number_of_rows" id="number_of_rows">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <button class="button" id="btn_apply" onclick="apply_Number_of_Rows()">Apply</button>
                <button class="button" onclick="printTable()">Print Table</button>
                <button class="button" onclick="exportToExcel()">Export to Excel</button>

              </div>

            <br>

            <script>
                var current_page = 1;
                var records_per_page = 10;
                var l = document.getElementById("table_id").rows.length;

                function apply_Number_of_Rows() {
                    var x = document.getElementById("number_of_rows").value;
                    records_per_page = x;
                    changePage(current_page);
                }

                function prevPage() {
                    if (current_page > 1) {
                        current_page--;
                        changePage(current_page);
                    }
                }

                function nextPage() {
                    if (current_page < numPages()) {
                        current_page++;
                        changePage(current_page);
                    }
                }

                function changePage(page) {
                    var btn_next = document.getElementById("btn_next");
                    var btn_prev = document.getElementById("btn_prev");
                    var listing_table = document.getElementById("table_id");
                    var page_span = document.getElementById("page");

                    if (page < 1) page = 1;
                    if (page > numPages()) page = numPages();

                    [...listing_table.getElementsByTagName('tr')].forEach((tr) => {
                        tr.style.display = 'none';
                    });
                    listing_table.rows[0].style.display = "";

                    for (var i = (page - 1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
                        if (listing_table.rows[i]) {
                            listing_table.rows[i].style.display = "";
                        } else {
                            continue;
                        }
                    }

                    page_span.innerHTML = page + "/" + numPages() + " (Total Number of Rows = " + (l - 1) + ") | Number of Rows : ";

                    if (page == 0 && numPages() == 0) {
                        btn_prev.disabled = true;
                        btn_next.disabled = true;
                        return;
                    }

                    if (page == 1) {
                        btn_prev.disabled = true;
                    } else {
                        btn_prev.disabled = false;
                    }

                    if (page == numPages()) {
                        btn_next.disabled = true;
                    } else {
                        btn_next.disabled = false;
                    }
                }

                function numPages() {
                    return Math.ceil((l - 1) / records_per_page);
                }

                window.onload = function () {
                    var x = document.getElementById("number_of_rows").value;
                    records_per_page = x;
                    changePage(current_page);
                };

                function toggleSideNav() {
                    var sideNav = document.getElementById("sideNav");
                    var isi = document.getElementById("isi");
                    var menuIcon = document.getElementById("menuIcon");

                    if (sideNav.style.width === "25%") {
                        sideNav.style.width = "0";
                        isi.style.marginLeft = "0";
                        menuIcon.style.marginLeft = "0";
                    } else {
                        sideNav.style.width = "25%";
                        isi.style.marginLeft = "25%";
                        menuIcon.style.marginLeft = "25%";
                    }
                }
                function printTable() {
            // Temporarily hide elements not meant for printing
            var originalDisplay = [];
            var elementsToHide = document.querySelectorAll('.navbar, .navsamping, .btn-group');

            elementsToHide.forEach(function (element) {
                originalDisplay.push(element.style.display);
                element.style.display = 'none';
            });

            // Print the table
            window.print();

            // Restore the original display property
            elementsToHide.forEach(function (element, index) {
                element.style.display = originalDisplay[index];
            });
        }
        function exportToExcel() {
          var table = document.getElementById('table_id');

          var data = [];
          var rows = table.querySelectorAll('tr');
          for (var i = 0; i < rows.length; i++) {
            var rowData = [];
            var cols = rows[i].querySelectorAll('th, td');
            for (var j = 0; j < cols.length; j++) {
              rowData.push(cols[j].innerText);
            }
            data.push(rowData);
          }
          var ws = XLSX.utils.aoa_to_sheet(data);
          var wb = XLSX.utils.book_new();
          XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
          XLSX.writeFile(wb, 'data_smartfishtank.xlsx');
        }
          </script>
        </div>
    </div>
</body>

</html>
