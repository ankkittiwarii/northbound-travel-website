<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if(empty($name) || empty($email) || empty($message)){
echo "Please fill all fields";
exit();
}

$sql = "INSERT INTO contact (name,email,message)
VALUES ('$name','$email','$message')";

if(mysqli_query($conn,$sql)){

echo "Message Sent Successfully";

}else{

echo "Error sending message";

}

?>