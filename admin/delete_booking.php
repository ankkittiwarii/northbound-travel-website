<?php

session_start();

// 🔐 Admin check
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../backend/db.php";

// 🔥 ID validate
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: bookings.php");
    exit();
}

$id = intval($_GET['id']);

// ✅ CHECK IF BOOKING EXISTS
$check = $conn->prepare("SELECT id FROM bookings WHERE id=?");
$check->bind_param("i", $id);
$check->execute();
$result = $check->get_result();

if($result->num_rows == 0){
    header("Location: bookings.php?error=notfound");
    exit();
}

// ✅ DELETE
$stmt = $conn->prepare("DELETE FROM bookings WHERE id=?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    header("Location: bookings.php?deleted=1");
    exit();
} else {
    header("Location: bookings.php?error=1");
    exit();
}

// ✅ close
$stmt->close();
$check->close();

?>