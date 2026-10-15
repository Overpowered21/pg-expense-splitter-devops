<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = (int)(getenv('DB_PORT') ?: '3307');
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$db = getenv('DB_NAME') ?: 'pg_expenses';

$conn = mysqli_init();

$sslEnabled = filter_var(
    getenv('DB_SSL') ?: 'false',
    FILTER_VALIDATE_BOOLEAN
);

$flags = $sslEnabled ? MYSQLI_CLIENT_SSL : 0;

$connected = mysqli_real_connect(
    $conn,
    $host,
    $user,
    $pass,
    $db,
    $port,
    null,
    $flags
);

if (!$connected) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(500);
    die('Database connection failed.');
}
?>
