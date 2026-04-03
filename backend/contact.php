<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.html?redirect=contact.html");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // 🔥 VALIDATION
    if(empty($name) || empty($email) || empty($message)){
        header("Location: ../pages/contact.html?error=empty");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../pages/contact.html?error=invalid_email");
        exit();
    }

    // 🔥 INSERT
    $stmt = $conn->prepare("INSERT INTO contact (name,email,message) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$email,$message);

    if($stmt->execute()){
        header("Location: ../pages/contact.html?success=1");
        exit();
    } else {
        header("Location: ../pages/contact.html?error=failed");
        exit();
    }
}
?>