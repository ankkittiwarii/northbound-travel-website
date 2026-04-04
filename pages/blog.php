<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Adventure Journal</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/blog.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="blog-section">
    <div class="container">
        <div class="section-header">
            <span class="category-label">TRAVEL BLOG</span>
            <h2>Adventure Journal</h2>
            <p>Stories, tips, and inspiration from our latest journeys across the northern frontiers.</p>
        </div>

        <div class="blog-grid">

            <div class="blog-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1506461883276-594a12b11cf3?auto=format&fit=crop&q=80&w=800" alt="Leh Ladakh Landscape">
                </div>
                <div class="card-content">
                    <span class="card-category">Destinations</span>
                    <h3 class="card-title">Beyond the Clouds: 7 Days in Leh Ladakh</h3>
                    <p class="card-desc">Discover the rugged beauty of high-altitude deserts and hidden monasteries in our ultimate guide.</p>
                    <a href="blog1.php" class="read-more">Read Story <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="blog-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&q=80&w=800" alt="Winter Packing">
                </div>
                <div class="card-content">
                    <span class="card-category">Travel Tips</span>
                    <h3 class="card-title">The Winter Packing List You Actually Need</h3>
                    <p class="card-desc">Don't overpack. We break down the essentials for staying warm and stylish in the Shimla snow.</p>
                    <a href="blog2.php" class="read-more">Read Story <span class="arrow">→</span></a>
                </div>
            </div>

            <div class="blog-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80&w=800" alt="Rajasthan Heritage Hotel">
                </div>
                <div class="card-content">
                    <span class="card-category">Luxury Travel</span>
                    <h3 class="card-title">Top 5 Heritage Stays in Rajasthan</h3>
                    <p class="card-desc">Experience the royal life. A curated list of palaces turned into premium hotels for your next stay.</p>
                    <a href="blog3.php" class="read-more">Read Story <span class="arrow">→</span></a>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>
</body>
</html>