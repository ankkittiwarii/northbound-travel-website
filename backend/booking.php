<?php

include "db.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$travel_date = $_POST['travel_date'];
$travelers = $_POST['travelers'];

$sql = "INSERT INTO bookings(name,phone,travel_date,travelers)
VALUES('$name','$phone','$travel_date','$travelers')";

mysqli_query($conn,$sql);

header("Location: ../pages/booking.html?success=1");

?>