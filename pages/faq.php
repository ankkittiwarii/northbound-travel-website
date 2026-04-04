<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Frequently Asked Questions</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/faq.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="faq-section">
    <div class="faq-header">
        <span class="category-label">GOT QUESTIONS?</span>
        <h2>Frequently Asked Questions</h2>
        <p>Everything you need to know before your NorthBound journey.</p>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq1" class="faq-input">
        <label for="faq1" class="faq-question">
            What is the best time for a Leh Ladakh road trip?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>The ideal window is from mid-May to October when high-altitude passes like Khardung La are open and the weather is favorable for driving.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq2" class="faq-input">
        <label for="faq2" class="faq-question">
            Do I need special permits for Pangong Tso?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>Yes, Inner Line Permits are required for restricted border areas. At NorthBound, we handle the entire permit process for you automatically.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq3" class="faq-input">
        <label for="faq3" class="faq-question">
            How do I handle altitude sickness?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>We recommend 48 hours of complete rest upon arrival in Leh. Stay hydrated, avoid caffeine, and follow our expert-guided acclimatization schedule.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq4" class="faq-input">
        <label for="faq4" class="faq-question">
            What payment methods do you accept for bookings?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>We accept all major credit/debit cards, UPI, and bank transfers. For premium custom itineraries, we also offer a "Pay in Parts" facility where you can secure your booking with a 25% deposit.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq5" class="faq-input">
        <label for="faq5" class="faq-question">
            What kind of vehicles are used for the mountain road trips?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>Safety is our priority. We exclusively use high-clearance 4x4 or AWD SUVs (like Toyota Innova Crysta or Mahindra Scorpio-N) driven by local experts who have years of experience navigating Himalayan terrain.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq6" class="faq-input">
        <label for="faq6" class="faq-question">
            Can I customize a private tour for a small group?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>Absolutely. While we have fixed group departures, "NorthBound" specializes in curated private experiences. You can customize everything from the pace of the journey to the luxury level of your stays.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq7" class="faq-input">
        <label for="faq7" class="faq-question">
            What is your cancellation policy?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>Cancellations made 30 days before the trip receive a 90% refund. For weather-related cancellations (like road closures), we provide a full credit note valid for 18 months toward any future NorthBound journey.</p>
        </div>
    </div>

    <div class="faq-item">
        <input type="checkbox" id="faq8" class="faq-input">
        <label for="faq8" class="faq-question">
            Is it safe for solo female travelers?
            <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
            <p>Yes. The regions we cover, especially Ladakh and Himachal, are known for being extremely safe. Additionally, our local guides are vetted, and we provide 24/7 on-call support for all our travelers.</p>
        </div>
    </div>

</section>

<script src="../assets/js/loginCheck.js"></script>
</body>
</html>