<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginsignup.php?redirect=contact.php");
    exit();
}

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

    // ✅ CHECK USER EXIST
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
    $message = trim($_POST['message'] ?? '');

    // ✅ VALIDATION
    if(empty($name) || empty($message)){
        header("Location: ../pages/contact.php?error=empty");
        exit();
    }

    // ✅ INSERT (WITH user_id)
    $stmt = $conn->prepare("INSERT INTO contact (user_id,name,email,message) VALUES (?,?,?,?)");
    $stmt->bind_param("isss",$user_id,$name,$email,$message);

    if($stmt->execute()){
        header("Location: ../pages/contact.php?success=1");
        exit();
    } else {
        header("Location: ../pages/contact.php?error=failed");
        exit();
    }
}
?>