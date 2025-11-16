<?php
// updateThresholds.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lowThreshold = $_POST["low_threshold"];
    $highThreshold = $_POST["high_threshold"];

    // Validation: You may add additional validation if needed

    // Update thresholds in the database
    include "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_update_threshold = "UPDATE updatedata SET low_threshold = ?, high_threshold = ? WHERE id = ?";
    $q_update_threshold = $pdo->prepare($sql_update_threshold);
    $q_update_threshold->execute(array($lowThreshold, $highThreshold, "ESP32_1"));

    Database::disconnect();

    echo "Thresholds updated successfully.";
} else {
    echo "Invalid request.";
}
?>
