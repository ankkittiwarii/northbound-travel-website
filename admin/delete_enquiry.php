<?php

session_start();

// 🔐 Admin check
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../backend/db.php";

// 🔥 ID validation
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: enquiries.php?error=invalid");
    exit();
}

$id = intval($_GET['id']);

// ✅ CHECK IF RECORD EXISTS
$check = $conn->prepare("SELECT id FROM contact WHERE id=?");
$check->bind_param("i", $id);
$check->execute();
$result = $check->get_result();

if($result->num_rows == 0){
    header("Location: enquiries.php?error=notfound");
    exit();
}

// ✅ DELETE (SECURE)
$stmt = $conn->prepare("DELETE FROM contact WHERE id=?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    header("Location: enquiries.php?deleted=1");
    exit();
} else {
    header("Location: enquiries.php?error=1");
    exit();
}

// ✅ CLOSE
$stmt->close();
$check->close();

?>