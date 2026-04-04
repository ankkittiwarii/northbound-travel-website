
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offers</title>
    <link rel="stylesheet" href="../assets/css/special.css">
</head>
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
            <a href="../pages/booking.php" onclick="checkLogin('booking.php')">Bookings</a>
            <a href="../pages/contact.php" onclick="checkLogin('contact.php')">Contact</a>
            
            <div class="dropdown">
                <button class="dropbtn">More ▼</button>
                <div class="dropdown-content">
                    <!-- <a href="../pages/Special.php">Special Offers</a> -->
                    <a href="../pages/blog.php">Blogs</a>
                    <a href="../pages/faq.php">FAQs</a>
                    <a href="../pages/gallery.php">Gallery</a>
                </div>
            </div>
        </nav>
    </header>
    <section class="special-offers">
  <div class="offers-container">
    <div class="offers-header">
      <h2>Exclusive Travel Deals</h2>
      <p>Unforgettable adventures at unbeatable prices. Book your next escape today!</p>
    </div>

    <div class="offers-flex-container">
      
      <div class="offer-card">
        <div class="badge discount-badge">Save 20%</div>
        <h3>Himalayan Retreat</h3>
        <p>Experience the serene snow-capped peaks of Manali and Shimla. Perfect for a rejuvenating weekend getaway.</p>
        <button class="offer-btn" onclick="window.open('packages.html', '_blank')">View Package</button>
      </div>

      <!-- <div class="offer-card highlight-card">
        <div class="badge urgent-badge">Flash Sale</div>
        <h3>Golden Sands Safari</h3>
        <p>Camp under the stars in Jaisalmer. Includes exclusive desert safari, camel rides, and cultural nights.</p>
        <div class="timer">Ends in: <span>2d 14h 30m</span></div>
        <button class="offer-btn primary-btn">Claim Deal</button>
      </div>
       -->
      <div class="offer-card highlight-card card-safari">
        <div class="badge urgent-badge">Flash Sale</div>
        <h3><i class="fa-solid fa-campground"></i> Golden Sands Safari</h3>
        <p>Camp under the stars in Jaisalmer. Includes exclusive desert safari, camel rides, and cultural nights.</p>
        <div class="timer">Ends in: <span>2d 14h 30m</span></div>
        
        <button class="offer-btn primary-btn" onclick="window.open('booking.html', '_blank')">Claim Deal</button>
    </div>

      <div class="offer-card">
        <div class="badge group-badge">15% Off</div>
        <h3>Ladakh Expedition</h3>
        <p>Gather your crew! Book a group of 4 or more for the ultimate Leh Ladakh road trip and unlock special perks.</p>
        <button class="offer-btn" onclick="window.open('contact.html','_blank')">Contact Us</button>
      </div>

    </div>

    <div class="offers-testimonial">
      <h3>What Our Travelers Say</h3>
      <p class="quote">"The Jaisalmer safari was breathtaking! Every detail was handled perfectly. An adventure of a lifetime."</p>
      <!-- <p class="author">— Karan S</p> -->
    </div>
  </div>
</section>
<script>
function checkLogin(page){

    const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

    if(isLoggedIn === "yes"){
        window.location.href = page;
    } else {
        if(confirm("⚠️ Login required to continue")){
            window.location.href = "../pages/loginsignup.php?redirect=" + page;
        }
    }
}
</script>
</body>
</html>
