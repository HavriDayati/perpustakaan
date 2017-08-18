<?php


// Konfigurasi database databse
$host = "localhost";
$dbname = "perpustakaan_ppi";
$username = "root";
$password = "";

try {
    // Buat Object PDO baru dan simpan ke variable $db
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
} catch (PDOException $exception){
    die("Connection error: " . $exception->getMessage());
}
