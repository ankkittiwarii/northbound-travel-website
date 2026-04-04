<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel";

// ✅ create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// ✅ check connection
if (!$conn) {
    die("Database connection failed");
}

// ✅ set charset (important)
mysqli_set_charset($conn, "utf8mb4");

?>