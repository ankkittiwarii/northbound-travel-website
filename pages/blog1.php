<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beyond the Clouds | NorthBound Adventure</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/blog1.css">
</head>
<body>
    
    <?php include "../includes/navbar.php"; ?>

    <div class="hero">
        <h1>Beyond the Clouds</h1>
    </div>
    
    <div class="container">
        <a href="blog.php" class="back-link">← Back to Journal</a>
        <p>Ladakh is more than just a destination; it is a spiritual calling. At an altitude of 3,500 meters, this high-altitude desert offers a landscape so raw and beautiful it feels like another planet.</p>

        <h2>The Magical 7-Day Plan</h2>
        <div class="itinerary-grid">
            <ul>
                <li><strong>Day 1-2:</strong> Rest and Acclimatization in Leh.</li>
                <li><strong>Day 3:</strong> Crossing Khardung La to Nubra Valley.</li>
                <li><strong>Day 4:</strong> Double-Humped Camel Safari in Hunder.</li>
                <li><strong>Day 5:</strong> Majestic shores of Pangong Tso.</li>
                <li><strong>Day 6-7:</strong> Monastery visits and return flight.</li>
            </ul>
        </div>

        <h2>Pro Traveler Tip</h2>
        <p>Hydration is your best friend in the mountains. Drink plenty of water and avoid heavy physical activity for the first 48 hours to prevent altitude sickness.</p>
    </div>

    <script src="../assets/js/loginCheck.js"></script>
</body>
</html>