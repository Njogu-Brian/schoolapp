<?php
// Load environment variables
$dotenv = parse_ini_file('../.env');

// Database connection
$host = $dotenv['DB_HOST'];
$user = $dotenv['DB_USER'];
$pass = $dotenv['DB_PASS'];
$name = $dotenv['DB_NAME'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session
session_start();
?>
