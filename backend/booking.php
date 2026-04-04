<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.php?redirect=booking.php");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

    // ✅ CHECK USER EXIST (FOREIGN KEY FIX)
    $checkUser = $conn->prepare("SELECT email FROM users WHERE id=?");
    $checkUser->bind_param("i",$user_id);
    $checkUser->execute();
    $resultUser = $checkUser->get_result();

    if($resultUser->num_rows == 0){
        session_destroy();
        header("Location: ../pages/loginsignup.php");
        exit();
    }

    $user = $resultUser->fetch_assoc();
    $email = $user['email'];

    // ✅ SAFE INPUT
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $package = $_POST['package'] ?? '';
    $persons = $_POST['persons'] ?? 1;
    $travel_date = $_POST['travel_date'] ?? '';

    // ✅ VALIDATION
    if(empty($name) || empty($phone) || empty($travel_date)){
        header("Location: ../pages/booking.php?error=empty");
        exit();
    }

    // ✅ INSERT QUERY (MATCH DB)
    $stmt = $conn->prepare("INSERT INTO bookings(user_id,name,email,phone,destination,persons,travel_date) VALUES(?,?,?,?,?,?,?)");

    $stmt->bind_param("issssis",$user_id,$name,$email,$phone,$package,$persons,$travel_date);

    if($stmt->execute()){
        header("Location: ../pages/booking.php?success=1");
        exit();
    } else {
        header("Location: ../pages/booking.php?error=1");
        exit();
    }
}
?>