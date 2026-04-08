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
    <title>NorthBound - Secure Booking</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/booking.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="booking-section">
    <div class="booking-wrapper">
        <div class="booking-card">

            <div class="booking-form-side">
                <h2>Complete Your Booking</h2>
                <p>Enter your details below to secure your spot.</p>

                <form id="proBookingForm" method="POST" action="../backend/booking.php">
                    <input type="hidden" name="package" id="packageInput">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="e.g. Ankit Tiwari" required>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" placeholder="+91 6283******" required>
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

                    <button type="submit" class="pay-btn">Confirm & Claim Deal</button>
                </form>
            </div>

            <div class="summary-side">
                <span class="secure-badge">🔒 Secure Checkout</span>
                <h3>Package Summary</h3>

                <div class="package-info">
                    <h4 id="displayPackage">Jaisalmer Golden Sands</h4>
                    <p id="packageDetails">3 Days / 2 Nights • Luxury Desert Camp</p>

                    <div class="price-tag">
                        <span class="old-price">₹10,000</span>
                        <span class="new-price">₹6,999<span class="per-person"> / person</span></span>
                    </div>
                </div>

                <div class="perks-container">
                    <h4>What's Included:</h4>
                    <ul class="perks">
                        <li><span class="check">✓</span> Free Camel Safari</li>
                        <li><span class="check">✓</span> Cultural Folk Dance</li>
                        <li><span class="check">✓</span> Breakfast & Dinner included</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<div id="toast">Message here...</div>

<script src="../assets/js/loginCheck.js"></script>

<script>
    // Handle URL Success/Error Alerts
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('success')){
        alert("✅ Your booking request has been submitted successfully!");
    }
    if(urlParams.get('error')){
        alert("❌ Booking failed. Please try again or contact support.");
    }

    // 🔥 PACKAGE LOGIC
    window.onload = function() {
        const pkg = urlParams.get('package');

        const packageData = {
            'jaisalmer': {
                title: "Jaisalmer Golden Sands",
                details: "3 Days / 2 Nights • Luxury Desert Camp",
                oldPrice: "₹10,000",
                newPrice: "6,999",
                perks: ["Free Camel Safari", "Cultural Folk Dance", "Breakfast & Dinner included"]
            },
            'ladakh': {
                title: "Ladakh Expedition",
                details: "6 Days / 5 Nights • Leh & Pangong Lake",
                oldPrice: "₹20,000",
                newPrice: "15,500",
                perks: ["Bike Rental Included", "Oxygen Support in Vehicle", "Inner Line Permits"]
            },
            'shimla': {
                title: "Himalayan Retreat",
                details: "4 Days / 3 Nights • Mountain View Resort",
                oldPrice: "₹12,000",
                newPrice: "8,499",
                perks: ["Guided Trekking", "Bonfire & Music Night", "Luxury Accommodation"]
            }
        };

        if (pkg && packageData[pkg]) {
            const data = packageData[pkg];

            document.getElementById('displayPackage').innerText = data.title;
            document.getElementById('packageDetails').innerText = data.details;
            document.querySelector('.old-price').innerText = data.oldPrice;
            // Kept the HTML structure but injected the value safely
            document.querySelector('.new-price').innerHTML = `₹${data.newPrice}<span class="per-person"> / person</span>`;
            document.getElementById("packageInput").value = pkg;

            const perksList = document.querySelector('.perks');
            perksList.innerHTML = data.perks.map(p => `<li><span class="check">✓</span> ${p}</li>`).join('');
        }
    };
</script>

</body>
</html>