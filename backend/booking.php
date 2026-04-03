<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.html?redirect=booking.php");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

    // 🔥 SAFE INPUT
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $package = $_POST['package'];
    $persons = $_POST['persons'];
    $travel_date = $_POST['travel_date'];

    // 🔥 VALIDATION
    if(empty($name) || empty($phone) || empty($travel_date)){
        header("Location: ../pages/booking.php?error=empty");
        exit();
    }

    // 🔥 DEFAULT VALUE (safety)
    if(empty($persons)){
        $persons = 1;
    }

    // 🔥 INSERT QUERY
    $stmt = $conn->prepare("INSERT INTO bookings(user_id,name,phone,destination,persons,travel_date) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("isssis",$user_id,$name,$phone,$package,$persons,$travel_date);

    if($stmt->execute()){
        header("Location: ../pages/booking.php?success=1");
        exit();
    } else {
        header("Location: ../pages/booking.php?error=1");
        exit();
    }
}
?>