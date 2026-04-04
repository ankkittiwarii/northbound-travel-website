<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winter Essentials | NorthBound Tips</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/blog2.css">
</head>
<body>

    <?php include "../includes/navbar.php"; ?>

    <div class="hero">
        <h1>Winter Packing Guide</h1>
    </div>
    
    <div class="content">
        <a href="blog.php" class="back-link">← Back to Journal</a>
        <h2>Mastering the 3-Layer Rule</h2>
        <p>Weather in the North can be unpredictable. The key to staying comfortable is "Layering."</p>

        <div class="packing-grid">
            <div class="item-card">
                <h3>1. The Base Layer</h3>
                <p>Synthetic or woolen thermals that wick away moisture and keep your body heat trapped.</p>
            </div>
            <div class="item-card">
                <h3>2. The Mid Layer</h3>
                <p>A thick fleece or down jacket to provide insulation from the biting mountain wind.</p>
            </div>
            <div class="item-card">
                <h3>3. The Outer Shell</h3>
                <p>A high-quality windcheater or waterproof parka to protect you from snow and rain.</p>
            </div>
            <div class="item-card">
                <h3>4. Essential Accessories</h3>
                <p>Don't forget woolen socks, heavy-duty gloves, a beanie cap, and polarized sunglasses.</p>
            </div>
        </div>
    </div>

    <script src="../assets/js/loginCheck.js"></script>
</body>
</html>