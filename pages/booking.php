<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../pages/loginsignup.php?redirect=booking.php");
    exit();
}
?>

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
        <div class="logo"><img src="../assets/images/logoimage.jfif" alt="logo">NorthBound</div>
        <nav>
            <a href="../index.php">Home</a>
            <a href="../pages/loginsignup.php">Login</a>
            <a href="../pages/destination.php">Destinations</a>
            <a href="../pages/Hotels.php">Hotels</a>
            <a href="../pages/activities.php">Activities</a>
            <a href="../pages/packages.php">Packages</a>

            <!-- 🔥 FIXED -->
            <a href="#" onclick="checkLogin('booking.php')">Bookings</a>
            <a href="#" onclick="checkLogin('contact.php')">Contact</a>
            
            <div class="dropdown">
                <button class="dropbtn">More ▼</button>
                <div class="dropdown-content">
                    <a href="../pages/Special.php">Special Offers</a>
                    <a href="../pages/blog.php">Blogs</a>
                    <a href="../pages/faq.php">FAQs</a>
                    <a href="../pages/gallery.php">Gallery</a>
                </div>
            </div>
        </nav>
    </header>

<div class="booking-wrapper">
<div class="booking-card">

<div class="booking-form-side">

<h2>Complete Your Booking</h2>
<p>Enter your details to secure your spot.</p>

<form id="proBookingForm" method="POST" action="../backend/booking.php">

<input type="hidden" name="package" id="packageInput">

<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

<div class="input-group">
<label>Full Name</label>
<input type="text" name="name" placeholder="e.g. Rajan" required>
</div>

<div class="input-row">

<div class="input-group">
<label>Phone Number</label>
<input type="tel" name="phone" placeholder="+91 9878******" required>
</div>

<div class="input-group">
<label>Travel Date</label>
<input type="date" name="travel_date" required>
</div>

</div>

<div class="input-group">
<label>Number of Travelers</label>
<input type="number" name="persons" min="1" max="20" value="1">
</div>

<button type="submit" class="pay-btn">Claim Deal Now</button>

</form>

</div>

<div id="toast">Message here...</div>

<div class="summary-side">

<h3>Package Summary</h3>

<div class="package-info">
<h4 id="displayPackage">Jaisalmer Golden Sands</h4>
<p id="packageDetails">3 Days / 2 Nights • Luxury Desert Camp</p>

<div class="price-tag">
<span class="old-price">₹10,000</span>
<span class="new-price">₹6,999 / person</span>
</div>

</div>

<ul class="perks">
<li>✅ Free Camel Safari</li>
<li>✅ Cultural Folk Dance</li>
<li>✅ Breakfast & Dinner included</li>
</ul>

</div>

</div>
</div>

<script>

// 🔥 LOGIN CHECK FUNCTION
function checkLogin(page){

    const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

    if(isLoggedIn === "yes"){
        window.location.href = "../pages/" + page;
    } else {
        if(confirm("⚠️ Login required to continue")){
            window.location.href = "../pages/loginsignup.php?redirect=" + page;
        }
    }
}

// 🔥 PACKAGE LOGIC
window.onload = function() {

const urlParams = new URLSearchParams(window.location.search);
const pkg = urlParams.get('package');

const packageData = {

'jaisalmer': {
title: "Jaisalmer Golden Sands",
details: "3 Days / 2 Nights • Luxury Desert Camp",
oldPrice: "₹10,000",
newPrice: "6999",
perks: ["Free Camel Safari","Cultural Folk Dance","Breakfast & Dinner"]
},

'ladakh': {
title: "Ladakh Expedition",
details: "6 Days / 5 Nights • Leh & Pangong Lake",
oldPrice: "₹20,000",
newPrice: "15500",
perks: ["Bike Rental Included","Oxygen Support","Inner Line Permits"]
},

'shimla': {
title: "Himalayan Retreat",
details: "4 Days / 3 Nights • Mountain View Resort",
oldPrice: "₹12,000",
newPrice: "8499",
perks: ["Guided Trekking","Bonfire Night","Luxury Stay"]
}

};

if (pkg && packageData[pkg]) {

const data = packageData[pkg];

document.getElementById('displayPackage').innerText = data.title;
document.getElementById('packageDetails').innerText = data.details;

document.querySelector('.old-price').innerText = data.oldPrice;
document.querySelector('.new-price').innerText = "₹" + data.newPrice + " / person";

document.getElementById("packageInput").value = pkg;

const perksList = document.querySelector('.perks');
perksList.innerHTML = data.perks.map(p => `<li>✅ ${p}</li>`).join('');

}

};

</script>

</body>
</html>