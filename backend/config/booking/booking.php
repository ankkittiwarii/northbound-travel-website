<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$people = $_POST['people'];

$sql = "INSERT INTO booking(name,email,destination,date,people)
VALUES('$name','$email','$destination','$date','$people')";

mysqli_query($conn,$sql);

echo "Booking Successful";
?>