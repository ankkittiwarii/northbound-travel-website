<?php

session_start();

include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
echo "All fields required";
exit();
}

$sql = "SELECT * FROM users 
WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$_SESSION['user'] = $email;

header("Location: ../interface.html");

}else{

echo "Invalid Email or Password";

}

?>