<?php
session_start();

include "db.php";

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$redirect = $_POST['redirect'] ?? '';

// ✅ validation
if(empty($email) || empty($password)){
    header("Location: ../pages/loginsignup.php?error=empty");
    exit();
}

// ✅ email format check
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../pages/loginsignup.php?error=invalid_email");
    exit();
}

// ✅ check user
$stmt = $conn->prepare("SELECT id,name,password FROM users WHERE email=?");
$stmt->bind_param("s",$email);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){

    $user = $result->fetch_assoc();

    if(password_verify($password,$user['password'])){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name']; // 🔥 ADD THIS

        if(!empty($redirect)){
            header("Location: ../pages/" . $redirect);
        } else {
            header("Location: ../index.php");
        }
        exit();

    } else {
        header("Location: ../pages/loginsignup.php?error=wrongpass");
        exit();
    }

} else {
    header("Location: ../pages/loginsignup.php?error=nouser");
    exit();
}
?>