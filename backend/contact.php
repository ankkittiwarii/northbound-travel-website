<?php

include "db.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

if(empty($name) || empty($email) || empty($message)){
echo "Please fill all fields";
exit();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid email format";
exit();
}

$stmt = $conn->prepare("INSERT INTO contact (name,email,message) VALUES (?,?,?)");

$stmt->bind_param("sss",$name,$email,$message);

if($stmt->execute()){

header("Location: ../pages/contact.html?success=1");
exit();

}else{

header("Location: ../pages/contact.html?error=1");
exit();

}

?>