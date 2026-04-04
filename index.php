<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Premium Travel Experiences</title>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/interfaces.css">
</head>
<body>

<?php include "includes/navbar.php"; ?>

    <section class="hero-section">
        <div class="hero-bg" id="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Discover the North</h1>
            <h2>Why Travel With NorthBound?</h2>
            <p>
                NorthBound is dedicated to delivering premium travel experiences across Northern India.
                We combine comfort, adventure, and local authenticity to craft journeys that stay with you forever.
                Whether it's serene valleys, snowy peaks, or cultural heritage, we ensure every moment feels
                extraordinary.
            </p>

            <div class="buttons">
                <a href="pages/packages.php" class="btn btn-primary">View Packages</a>
                <a href="pages/destination.php" class="btn btn-outline">Explore Destinations</a>
            </div>
        </div>
    </section>

<script src="assets/js/loginCheck.js"></script>       
<script>       
const images = [
    "assets/images/mountainimage.jpg",
    "assets/images/mountainimage1.jpg",
    "assets/images/mountainimage2.jpg",
    "assets/images/mountainimage3.jpg"
];

let i = 0;
const heroBg = document.getElementById("hero-bg");

function changeBackground() {
    // Apply image to the separate background div
    heroBg.style.backgroundImage = `url('${images[i]}')`;
    i++;
    if (i >= images.length) {
        i = 0;
    }
}

// Initial call and interval setup
changeBackground();
setInterval(changeBackground, 5000);
</script>

</body>
</html>