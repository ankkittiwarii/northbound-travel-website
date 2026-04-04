<?php

include "db.php";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// ✅ validation
if(empty($name) || empty($email) || empty($password)){
    header("Location: ../pages/loginsignup.php?error=empty");
    exit();
}

// ✅ email format check
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../pages/loginsignup.php?error=invalid_email");
    exit();
}

// ✅ password length check
if(strlen($password) < 6){
    header("Location: ../pages/loginsignup.php?error=weak_password");
    exit();
}

// ✅ check duplicate email
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s",$email);
$check->execute();
$result = $check->get_result();

if($result->num_rows > 0){
    header("Location: ../pages/loginsignup.php?error=email_exists");
    exit();
}

// ✅ password hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// ✅ insert user
$stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
$stmt->bind_param("sss",$name,$email,$hashed_password);

if($stmt->execute()){
    header("Location: ../pages/loginsignup.php?success=signup");
    exit();
} else {
    header("Location: ../pages/loginsignup.php?error=failed");
    exit();
}

?>