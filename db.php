<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3307';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$db = getenv('DB_NAME') ?: 'pg_expenses';

$conn = mysqli_connect($host, $user, $pass, $db, (int)$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>