<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Rajasthan | NorthBound Luxury</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/blog3.css">
</head>
<body>

    <?php include "../includes/navbar.php"; ?>

    <div class="hero">
        <h1>Heritage Stays</h1>
    </div>
    
    <div class="content">
        <a href="blog.php" class="back-link">← Back to Journal</a>
        <h2>Experience the Life of Kings</h2>
        <p>Rajasthan is home to ancient palaces that have been transformed into world-class luxury hotels. NorthBound brings you the top picks for an ultimate royal stay.</p>

        <div class="hotel-list">
            <div class="hotel">
                <div class="hotel-img-wrapper">
                    <img src="../assets/images/taj_lake_palace_hotel_1-b.webp" alt="Lake Palace">
                </div>
                <div class="hotel-info">
                    <h3>Taj Lake Palace, Udaipur</h3>
                    <p>Floating in the middle of Lake Pichola, this white marble palace is the pinnacle of romance and luxury. Originally built as a pleasure palace, it now offers guests a true royal experience.</p>
                </div>
            </div>

            <div class="hotel">
                <div class="hotel-img-wrapper">
                    <img src="../assets/images/jodhpur.webp" alt="Umaid Bhawan">
                </div>
                <div class="hotel-info">
                    <h3>Umaid Bhawan, Jodhpur</h3>
                    <p>One of the world's largest private residences, offering a grand look at the lifestyle of the Marwar royalty. Set amidst 26 acres of lush gardens, it perfectly blends Eastern and Western architectural styles.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/loginCheck.js"></script>
</body>
</html>