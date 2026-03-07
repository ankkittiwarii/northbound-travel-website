<?php

include "db.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$travel_date = $_POST['travel_date'];
$travelers = $_POST['travelers'];

if(empty($name) || empty($phone) || empty($travel_date)){
echo "Please fill all fields";
exit();
}

$sql = "INSERT INTO bookings (name,phone,travel_date,travelers)
VALUES ('$name','$phone','$travel_date','$travelers')";

if(mysqli_query($conn,$sql)){

header("Location: ../pages/booking.html?success=1");

}else{

echo "Booking Failed";

}

?>