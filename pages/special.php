<?php
session_start();
// Yahan tum chaho toh check kar sakte ho agar user logged in hai ya nahi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Exclusive Special Offers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/special.css">
</head>
<body>

<?php include "../includes/navbar.php"; ?>
 
<section class="special-offers">
  <div class="offers-container">
    <div class="section-header">
      <span class="category-label">LIMITED TIME ONLY</span>
      <h2>Exclusive Travel Deals</h2>
      <p>Unforgettable adventures at unbeatable prices. Book your next escape today!</p>
    </div>

    <div class="offers-flex-container">
      
      <div class="offer-card">
        <div class="badge discount-badge">Save 20%</div>
        <div class="card-image-placeholder"><i class="fa-solid fa-mountain-sun"></i></div>
        <h3>Himalayan Retreat</h3>
        <p>Experience the serene snow-capped peaks of Manali and Shimla. Perfect for a rejuvenating weekend getaway.</p>
        <a href="packages.php?pkg=manali" class="offer-btn">View Package</a>
      </div>

      <div class="offer-card highlight-card">
        <div class="badge urgent-badge"><i class="fa-solid fa-bolt"></i> Flash Sale</div>
        <div class="card-image-placeholder orange-bg"><i class="fa-solid fa-tent"></i></div>
        <h3>Golden Sands Safari</h3>
        <p>Camp under the stars in Jaisalmer. Includes exclusive desert safari, camel rides, and cultural nights.</p>
        
        <div class="timer-box">
            <p>Offer Ends In:</p>
            <div id="countdown" class="countdown-timer">00d 00h 00m 00s</div>
        </div>

        <a href="booking.php?package=jaisalmer" class="offer-btn primary-btn">Claim Deal Now</a>
      </div>

      <div class="offer-card">
        <div class="badge group-badge">15% Off</div>
        <div class="card-image-placeholder"><i class="fa-solid fa-truck-monster"></i></div>
        <h3>Ladakh Expedition</h3>
        <p>Gather your crew! Book a group of 4 or more for the ultimate Leh Ladakh road trip and unlock special perks.</p>
        <a href="contact.php" class="offer-btn">Contact Us</a>
      </div>

    </div>

  </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // FIX: Set a specific end date (Current time + 2.5 days)
    // Asli project mein ye date database se aani chahiye
    const countDownDate = new Date().getTime() + (2.5 * 24 * 60 * 60 * 1000);

    const x = setInterval(function() {
      const now = new Date().getTime();
      const distance = countDownDate - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("countdown").innerHTML = 
        (days < 10 ? "0" + days : days) + "d " + 
        (hours < 10 ? "0" + hours : hours) + "h " + 
        (minutes < 10 ? "0" + minutes : minutes) + "m " + 
        (seconds < 10 ? "0" + seconds : seconds) + "s ";

      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "OFFER EXPIRED";
      }
    }, 1000);
  });
</script>

</body>
</html>