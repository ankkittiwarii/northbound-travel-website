<?php

include "db.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

if(empty($name) || empty($email) || empty($password)){
echo "All fields required";
exit();
}

/* check duplicate email */

$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s",$email);
$check->execute();
$result = $check->get_result();

if($result->num_rows > 0){
echo "Email already registered";
exit();
}

/* password hash */

$hashed_password = password_hash($password,PASSWORD_DEFAULT);

/* insert user */

$stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
$stmt->bind_param("sss",$name,$email,$hashed_password);

if($stmt->execute()){

header("Location: ../pages/loginsignup.html");

}else{

echo "Signup failed";

}

?>