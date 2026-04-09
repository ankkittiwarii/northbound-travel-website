<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.php?redirect=contact.php");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

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

    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? ''); 
    $message = trim($_POST['message'] ?? ''); // Sirf message rakho

    if(empty($name) || empty($message)){
        header("Location: ../pages/contact.php?error=empty");
        exit();
    }

    // UPDATE: Ab phone number alag column mein jayega
    // SQL Table mein humne 'phone' column add kar diya hai
    $stmt = $conn->prepare("INSERT INTO contact (user_id, name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    
    // "issss" -> i=int, s=string (5 placeholders ke liye)
    $stmt->bind_param("issss", $user_id, $name, $email, $phone, $message);

    if($stmt->execute()){
        header("Location: ../pages/contact.php?success=1");
        exit();
    } else {
        header("Location: ../pages/contact.php?error=failed");
        exit();
    }
}
?>