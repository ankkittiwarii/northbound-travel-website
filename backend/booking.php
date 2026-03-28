<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.html?redirect=booking.html");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $persons = $_POST['persons'];
    $travel_date = $_POST['travel_date'];

    if(empty($name) || empty($phone) || empty($travel_date)){
        echo "Please fill required fields";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO bookings(name,phone,destination,persons,travel_date) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssis",$name,$phone,$package,$persons,$travel_date);

    if($stmt->execute()){
        header("Location: ../pages/booking.html?success=1");
        exit();
    } else {
        header("Location: ../pages/booking.html?error=1");
        exit();
    }
}
?>