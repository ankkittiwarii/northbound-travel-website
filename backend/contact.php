<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact(name,email,message)
VALUES('$name','$email','$message')";

mysqli_query($conn,$sql);

echo "Message Sent";

?>