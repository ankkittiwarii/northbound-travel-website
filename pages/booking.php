<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure Booking | TravelDeals</title>

<link rel="stylesheet" href="../assets/css/booking.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<script>
const urlParams = new URLSearchParams(window.location.search);

if(urlParams.get('success')){
alert("✅ Your booking request has been submitted!");
}
if(urlParams.get('error')){
alert("❌ Booking failed. Please try again.");
}
</script>

<body>

<header>
<div class="logo"><img src="../assets/images/logoimage.jfif">NorthBound</div>
<nav>
<a href="../index.html">Home</a>
<a href="../pages/loginsignup.html">Login</a>
<a href="../pages/contact.php">Contact</a>
</nav>
</header>

<div class="booking-wrapper">
<div class="booking-card">

<div class="booking-form-side">

<h2>Complete Your Booking</h2>

<form id="proBookingForm" method="POST" action="../backend/booking.php" onsubmit="return checkLogin()">

<input type="hidden" name="package" id="packageInput">

<input type="text" name="name" placeholder="Name" required>
<input type="tel" name="phone" placeholder="Phone" required>
<input type="date" name="travel_date" required>
<input type="number" name="persons" value="1">

<button type="submit">Claim Deal Now</button>

</form>

</div>
</div>
</div>

<script>

// 🔥 LOGIN CHECK
function checkLogin(){

    var loggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    if(!loggedIn){
        alert("Login required!");

        window.location.href = "../pages/loginsignup.html?redirect=booking.php";
        return false;
    }

    return true;
}

</script>

</body>
</html>