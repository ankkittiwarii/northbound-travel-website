<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.php?redirect=booking.php");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

    // 1. User Validation
    $checkUser = $conn->prepare("SELECT email FROM users WHERE id=?");
    $checkUser->bind_param("i", $user_id);
    $checkUser->execute();
    $resultUser = $checkUser->get_result();

    if($resultUser->num_rows == 0){
        session_destroy();
        header("Location: ../pages/loginsignup.php");
        exit();
    }

    $user = $resultUser->fetch_assoc();
    $email = $user['email'];

    // 2. Data Collection
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $package = $_POST['package'] ?? ''; 
    $persons = intval($_POST['persons'] ?? 1);
    $travel_date = $_POST['travel_date'] ?? '';
    $total_price = $_POST['total_price'] ?? 0.00; // DECIMAL ke liye numeric value

    // 3. Validation
    if(empty($name) || empty($phone) || empty($travel_date) || empty($package)){
        header("Location: ../pages/booking.php?error=empty");
        exit();
    }

    // 4. INSERT QUERY (Strictly matching your SQL schema order)
    // Table order: user_id, name, email, phone, destination, persons, total_price, travel_date
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, name, email, phone, destination, persons, total_price, travel_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Types: i (int), s (string), s, s, s, i, d (decimal/double), s (date string)
    $stmt->bind_param("issssiss", $user_id, $name, $email, $phone, $package, $persons, $total_price, $travel_date);

    if($stmt->execute()){
        header("Location: ../pages/booking.php?success=1");
        exit();
    } else {
        header("Location: ../pages/booking.php?error=1");
        exit();
    }
}
?>