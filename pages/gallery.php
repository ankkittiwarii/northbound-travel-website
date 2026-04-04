<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Northbound Gallery</title>
<link href="../assets/css/gallery.css" rel="stylesheet">
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

        <!-- 🔥 FIXED -->
        <a href="#" onclick="checkLogin('booking.php')">Bookings</a>
        <a href="#" onclick="checkLogin('contact.php')">Contact</a>
        
        <div class="dropdown">
            <button class="dropbtn">More ▼</button>
            <div class="dropdown-content">
                <a href="../pages/Special.php">Special Offers</a>
                <a href="../pages/blog.php">Blogs</a>
                <a href="../pages/faq.php">FAQs</a>
            </div>
        </div>
    </nav>
</header>

<div class="gallery-section">
    <div class="gallery-header">
        <h2>Explore the North</h2>
        <p>From snow peaks to golden sands</p>
    </div>

    <div class="gallery-grid">

        <!-- 🔥 TERA SAME CONTENT (unchanged) -->

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
</div>

<script>

// 🔥 LOGIN CHECK
function checkLogin(page){

    const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

    if(isLoggedIn === "yes"){
        window.location.href = "../pages/" + page;
    } else {
        if(confirm("⚠️ Login required to continue")){
            window.location.href = "../pages/loginsignup.php?redirect=" + page;
        }
    }
}

</script>

</body>
</html>