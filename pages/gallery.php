<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NorthBound - Travel Gallery</title>
<link rel="stylesheet" href="../assets/css/navbar.css">
<link href="../assets/css/gallery.css" rel="stylesheet">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="gallery-section">
    <div class="gallery-header">
        <span class="category-label">VISUAL JOURNEY</span>
        <h2>Explore the North</h2>
        <p>From snow-capped peaks to golden desert sands, witness the magic through our lens.</p>
    </div>

    <div class="gallery-grid">

        <div class="gallery-item">
            <img src="../assets/images/gulmarggallery.webp" alt="Gulmarg">
            <div class="overlay"><span>Kashmir</span><h4>Gulmarg</h4></div>
        </div>

        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500" alt="Ladakh">
            <div class="overlay"><span>Himalayas</span><h4>Leh Ladakh</h4></div>
        </div>

        <div class="gallery-item">
            <img src="../assets/images/jaisalmergallery.jpg" alt="Jaisalmer">
            <div class="overlay"><span>Rajasthan</span><h4>Jaisalmer</h4></div>
        </div>

        <div class="gallery-item">
            <img src="../assets/images/rishikeshgallery.webp" alt="Rishikesh">
            <div class="overlay"><span>Spiritual</span><h4>Rishikesh</h4></div>
        </div>

        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=500" alt="Manali">
            <div class="overlay"><span>Adventure</span><h4>Manali</h4></div>
        </div>

        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=500" alt="Spiti">
            <div class="overlay"><span>Remote</span><h4>Spiti Valley</h4></div>
        </div>

        <div class="gallery-item">
            <img src="../assets/images/dharamshalagallery.jpg" alt="Dharamshala">
            <div class="overlay"><span>Peace</span><h4>Dharamshala</h4></div>
        </div>

        <div class="gallery-item">
            <img src="../assets/images/amritsargallery.webp" alt="Amritsar">
            <div class="overlay"><span>Heritage</span><h4>Amritsar</h4></div>
        </div>
        
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=500" alt="Auli">
            <div class="overlay"><span>Skiing</span><h4>Auli</h4></div>
        </div>

    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

</body>
</html>