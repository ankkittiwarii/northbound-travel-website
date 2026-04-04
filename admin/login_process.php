<?php
session_start();

include "../backend/db.php";

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// ✅ validation
if(empty($username) || empty($password)){
    header("Location: login.php?error=invalid");
    exit();
}

// ✅ secure query
$stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
$stmt->bind_param("s",$username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){

    $admin = $result->fetch_assoc();

    // ✅ password check (MD5)
    if(md5($password) === $admin['password']){

        $_SESSION['admin'] = $admin['username'];

        header("Location: dashboard.php");
        exit();

    } else {
        header("Location: login.php?error=invalid");
        exit();
    }

} else {
    header("Location: login.php?error=invalid");
    exit();
}
?>