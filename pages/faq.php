<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../assets/css/faq.css">

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
                    <a href="../pages/Special.php">Special Offers</a>
                    <a href="../pages/blog.php">Blogs</a>
                    <!-- <a href="../pages/faq.php">FAQs</a> -->
                    <a href="../pages/gallery.php">Gallery</a>
                </div>
            </div>
        </nav>
    </header>
<div class="faq-container">
    <div class="faq-header">
        <h2>Frequently Asked Questions</h2>
        <p>Everything you need to know before your Northbound journey.</p>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq1" class="faq-input">
        <label for="faq1" class="faq-question">
            What is the best time for a Leh Ladakh road trip?
            <span>+</span>
        </label>
        <div class="faq-answer">
            <p>The ideal window is from mid-May to October when high-altitude passes like Khardung La are open and the weather is favorable for driving.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq2" class="faq-input">
        <label for="faq2" class="faq-question">
            Do I need special permits for Pangong Tso?
            <span>+</span>
        </label>
        <div class="faq-answer">
            <p>Yes, Inner Line Permits are required for restricted border areas. At Northbound, we handle the entire permit process for you automatically.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq3" class="faq-input">
        <label for="faq3" class="faq-question">
            How do I handle altitude sickness?
            <span>+</span>
        </label>
        <div class="faq-answer">
            <p>We recommend 48 hours of complete rest upon arrival in Leh. Stay hydrated, avoid caffeine, and follow our expert-guided acclimatization schedule.</p>
        </div>
    </div>

    <div class="faq-item">
    <input type="checkbox" id="faq4" class="faq-input">
    <label for="faq4" class="faq-question">
        What payment methods do you accept for bookings?
        <span>+</span>
    </label>
    <div class="faq-answer">
        <p>We accept all major credit/debit cards, UPI, and bank transfers. For premium custom itineraries, we also offer a "Pay in Parts" facility where you can secure your booking with a 25% deposit.</p>
    </div>
</div>

<div class="faq-item">
    <input type="checkbox" id="faq5" class="faq-input">
    <label for="faq5" class="faq-question">
        What kind of vehicles are used for the mountain road trips?
        <span>+</span>
    </label>
    <div class="faq-answer">
        <p>Safety is our priority. We exclusively use high-clearance 4x4 or AWD SUVs (like Toyota Innova Crysta or Mahindra Scorpio-N) driven by local experts who have years of experience navigating Himalayan terrain.</p>
    </div>
</div>

<div class="faq-item">
    <input type="checkbox" id="faq6" class="faq-input">
    <label for="faq6" class="faq-question">
        Can I customize a private tour for a small group?
        <span>+</span>
    </label>
    <div class="faq-answer">
        <p>Absolutely. While we have fixed group departures, "Northbound" specializes in curated private experiences. You can customize everything from the pace of the journey to the luxury level of your stays.</p>
    </div>
</div>

<div class="faq-item">
    <input type="checkbox" id="faq7" class="faq-input">
    <label for="faq7" class="faq-question">
        What is your cancellation policy?
        <span>+</span>
    </label>
    <div class="faq-answer">
        <p>Cancellations made 30 days before the trip receive a 90% refund. For weather-related cancellations (like road closures), we provide a full credit note valid for 18 months toward any future Northbound journey.</p>
    </div>
</div>

<div class="faq-item">
    <input type="checkbox" id="faq8" class="faq-input">
    <label for="faq8" class="faq-question">
        Is it safe for solo female travelers?
        <span>+</span>
    </label>
    <div class="faq-answer">
        <p>Yes. The regions we cover, especially Ladakh and Himachal, are known for being extremely safe. Additionally, our local guides are vetted, and we provide 24/7 on-call support for all our travelers.</p>
    </div>
</div>
</div>
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