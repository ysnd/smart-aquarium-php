<?php
require 'database.php';

if (!empty($_POST)) {
    $id = $_POST['id'];
    $suhu = $_POST['suhu'];
    $status_baca_suhu = $_POST['status_baca_suhu'];
    $lampu = $_POST['lampu'];
    $heater = $_POST['heater'];
    

    date_default_timezone_set("Asia/Jakarta");
    $tm = date("H:i:s");
    $dt = date("Y-m-d");

    try {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update data in the 'updatedata' table
        $updateSql = "UPDATE updatedata SET suhu = ?, status_baca_suhu = ?, time = ?, date = ? WHERE id = ?";
        $updateQuery = $pdo->prepare($updateSql);
        $updateQuery->execute(array($suhu, $status_baca_suhu, $tm, $dt, $id));

        // Insert data into the 'record' table
        $insertSql = "INSERT INTO record (id, board, suhu, status_baca_suhu, lampu, heater, time, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insertQuery = $pdo->prepare($insertSql);
        $insertQuery->execute(array(generate_string_id(10), $id, $suhu, $status_baca_suhu, $lampu, $heater, $tm, $dt));

        echo "Data berhasil diupdate dan disimpan di tabel 'record'.";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        Database::disconnect();
    }
}

function generate_string_id($strength = 16) {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($permitted_chars);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
?>
