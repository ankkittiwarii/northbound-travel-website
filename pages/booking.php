<?php
session_start();

// Security check
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                    <input type="hidden" name="total_price" id="totalPriceInput">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">

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
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="ankit@example.com" required>
                        </div>
                    </div>
                    
                    <div class="input-row">
                        <div class="input-group">
                            <label>Select Destination</label>
                            <select name="destination" id="destinationSelect" required class="custom-select">
                                <option value="" disabled selected>Choose a destination</option>
                                <option value="jaisalmer">Jaisalmer Golden Sands</option>
                                <option value="manali">Manali Snow Adventure</option>
                                <option value="shimla">Shimla Himalayan Retreat</option>
                                <option value="ladakh">Ladakh Expedition</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Travel Date</label>
                            <input type="date" name="travel_date" required>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label>Number of Travelers</label>
                        <input type="number" name="persons" id="travelerCount" min="1" max="20" value="1" oninput="updateUI(document.getElementById('destinationSelect').value)">
                    </div>

                    <button type="submit" class="pay-btn">Confirm & Claim Deal</button>
                </form>
            </div>

            <aside class="summary-side">
                <div class="secure-badge"><i class="fa-solid fa-shield-halved"></i> Secure Booking</div>
                
                <div class="package-info">
                    <h3 id="displayPackage">Your Adventure</h3>
                    <p id="packageDetails">Please select a destination</p>
                </div>
                
                <div class="price-tag">
                    <div class="new-price" id="finalPrice">₹0</div>
                    <div class="per-person" id="basePriceText">Select a package</div>
                </div>

                <div class="perks-container">
                    <h4>What's Included:</h4>
                    <ul class="perks" id="perksList">
                        <li><span class="check">✓</span> Select destination to see perks</li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</section>

<div id="toast">Message here...</div>


<script src="../assets/js/loginCheck.js"></script>

<script>
    const packageData = {
        'jaisalmer': { title: "Jaisalmer Golden Sands", details: "3D/2N • Desert Camp", price: 6999, perks: ["Free Camel Safari", "Cultural Folk Dance", "Meals Included"] },
        'ladakh': { title: "Ladakh Expedition", details: "6D/5N • Leh & Pangong", price: 15500, perks: ["Bike Rental", "Oxygen Support", "Permits Included"] },
        'shimla': { title: "Shimla Himalayan Retreat", details: "4D/3N • Mountain Resort", price: 8499, perks: ["Guided Trekking", "Bonfire Night", "Luxury Stay"] },
        'manali': { title: "Manali Snow Adventure", details: "5D/4N • Solang Valley", price: 10999, perks: ["Skiing Gear", "Paragliding Discount", "Riverside Camp"] }
    };

    function updateUI(pkg) {
        if (pkg && packageData[pkg]) {
            const data = packageData[pkg];
            const travelers = parseInt(document.getElementById('travelerCount').value) || 1;
            const total = data.price * travelers;
            
            document.getElementById('displayPackage').innerText = data.title;
            document.getElementById('packageDetails').innerText = data.details;
            document.getElementById('basePriceText').innerText = `₹${data.price.toLocaleString()} per person`;
            document.getElementById('finalPrice').innerText = `₹${total.toLocaleString()}`;
            
            // Critical Fix: Syncing values with Hidden Inputs for Backend
            document.getElementById("packageInput").value = data.title;
            document.getElementById("totalPriceInput").value = total;

            document.getElementById('perksList').innerHTML = data.perks.map(p => `<li><span class="check">✓</span> ${p}</li>`).join('');
        }
    }

    document.getElementById('destinationSelect').addEventListener('change', (e) => updateUI(e.target.value));

    window.onload = () => {
        const params = new URLSearchParams(window.location.search);
        const pkg = params.get('package');
        if(pkg && packageData[pkg]) {
            document.getElementById('destinationSelect').value = pkg;
            updateUI(pkg);
        }
        
        // Success/Error handling
        if(params.get('success')){ alert("✅ Booking submitted successfully!"); }
        if(params.get('error')){ alert("❌ Booking failed. Please try again."); }
    };
</script>

</body>
</html>