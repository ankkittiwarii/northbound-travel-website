<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Special Offers</title>
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
        <h3>Himalayan Retreat</h3>
        <p>Experience the serene snow-capped peaks of Manali and Shimla. Perfect for a rejuvenating weekend getaway.</p>
        <a href="packages.php" class="offer-btn">View Package</a>
      </div>

      <div class="offer-card highlight-card card-safari">
        <div class="badge urgent-badge"><i class="fa-solid fa-bolt"></i> Flash Sale</div>
        <h3><i class="fa-solid fa-campground"></i> Golden Sands Safari</h3>
        <p>Camp under the stars in Jaisalmer. Includes exclusive desert safari, camel rides, and cultural nights.</p>
        <div class="timer">Ends in: <span id="countdown">2d 14h 30m 00s</span></div>
        <a href="booking.php" class="offer-btn primary-btn">Claim Deal</a>
      </div>

      <div class="offer-card">
        <div class="badge group-badge">15% Off</div>
        <h3>Ladakh Expedition</h3>
        <p>Gather your crew! Book a group of 4 or more for the ultimate Leh Ladakh road trip and unlock special perks.</p>
        <a href="contact.php" class="offer-btn">Contact Us</a>
      </div>

    </div>

    <div class="offers-testimonial">
      <i class="fa-solid fa-quote-left quote-icon"></i>
      <h3>What Our Travelers Say</h3>
      <p class="quote">"The Jaisalmer safari was breathtaking! Every detail was handled perfectly. An adventure of a lifetime."</p>
      <p class="author">— Karan S.</p>
    </div>
  </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Set duration for 2 days, 14 hours, 30 minutes in seconds
    let duration = (2 * 24 * 60 * 60) + (14 * 60 * 60) + (30 * 60); 
    const display = document.getElementById('countdown');

    function startTimer() {
      let timer = duration, days, hours, minutes, seconds;
      setInterval(function () {
        days = parseInt(timer / (60 * 60 * 24), 10);
        hours = parseInt((timer % (60 * 60 * 24)) / (60 * 60), 10);
        minutes = parseInt((timer % (60 * 60)) / 60, 10);
        seconds = parseInt(timer % 60, 10);

        // Add leading zeros to numbers less than 10
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

        // Decrease timer, reset if it hits 0 (for demo purposes)
        if (--timer < 0) {
          timer = duration;
        }
      }, 1000);
    }
    
    startTimer();
  });
</script>

</body>
</html>