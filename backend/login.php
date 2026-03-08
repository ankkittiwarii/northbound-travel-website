<?php

session_start();

include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
echo "All fields required";
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

header("Location: ../index.html");

}else{

echo "Wrong Password";

}

}else{

echo "User not found";

}

?>