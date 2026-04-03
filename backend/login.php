<?php
session_start();

include "db.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$redirect = $_POST['redirect'] ?? '';

if(empty($email) || empty($password)){
    header("Location: ../pages/loginsignup.html?error=empty");
    exit();
}

$stmt = $conn->prepare("SELECT id,password FROM users WHERE email=?");
$stmt->bind_param("s",$email);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){

    $user = $result->fetch_assoc();

    if(password_verify($password,$user['password'])){

        $_SESSION['user_id'] = $user['id'];

        if(!empty($redirect)){
            header("Location: ../pages/" . $redirect);
        } else {
            header("Location: ../index.html");
        }
        exit();

    } else {
        header("Location: ../pages/loginsignup.html?error=wrongpass");
        exit();
    }

} else {
    header("Location: ../pages/loginsignup.html?error=nouser");
    exit();
}
?>