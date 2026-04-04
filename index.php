<html>
<head>
    <title>NorthBound</title>
    <link rel="stylesheet" href="assets/css/interfaces.css">
    <meta charset="UTF-8">
</head>
<body>
    <header>
        <div class="logo"><img src="assets/images/logoimage.jfif" alt="logo">NorthBound</div>

        <nav>
            <a href="pages/loginsignup.php">Login</a>
            <a href="pages/destination.php">Destinations</a>
            <a href="pages/Hotels.php">Hotels</a>
            <a href="pages/activities.php">Activities</a>
            <a href="pages/packages.php">Packages</a>
            <a href="pages/booking.php" onclick="checkLogin('booking.php')">Bookings</a>
            <a href="pages/contact.php" onclick="checkLogin('contact.php')">Contact</a>

            <div class="dropdown">
                <button class="dropbtn">More ▼</button>
                <div class="dropdown-content">
                    <a href="pages/Special.php">Special Offers</a>
                    <a href="pages/blog.php">Blogs</a>
                    <a href="pages/faq.php">FAQs</a>
                    <a href="pages/gallery.php">Gallery</a>
                </div>
            </div>
        </nav>
    </header>
    <section class="mount">
        <div class="mount-content">
            <h2>Why Travel With NorthBound?</h2>
            <p>
                NorthBound is dedicated to delivering premium travel experiences across Northern India.
                We Combine confort, adventure, and local authenticity to craft journeys that stay with you forever.
                Whether it's serene valleys, snowy peaks, or cultural heritage, we ensure every moment feels
                extraordinary.
            </p>
            <section>
                <div class="buttons">
                    <button class="btn1" onclick="window.open('pages/packages.php')">View Packages</button>
                    <button class="btn2" onclick="window.open('pages/destination.php')">Explore Destinations</button>
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
            window.location.href = "pages/loginsignup.php?redirect=" + page;
        }
    }
}

        const images = [
            "assets/images/mountainimage.jpg",
            "assets/images/mountainimage1.jpg",
            "assets/images/mountainimage2.jpg",
            "assets/images/mountainimage3.jpg"
        ];

        let i = 0;
        const mount = document.querySelector(".mount");

        function cbground() {
            mount.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('" + images[i] + "')";

            mount.style.backgroundSize = "cover";
            mount.style.backgroundPosition = "center";
            i++;
            if (i >= images.length) {
                i = 0;
            }
        }
        cbground();
        setInterval(cbground, 5000);
</script>

</body>
</html>