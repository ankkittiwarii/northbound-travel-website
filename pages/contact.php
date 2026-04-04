<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | Northbound</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/contact.css">
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

        <div class="dropdown">
            <button class="dropbtn">More ▼</button>
            <div class="dropdown-content">
                <a href="../pages/Special.php">Special Offers</a>
                <a href="../pages/blog.php">Blogs</a>
                <a href="../pages/faq.php">FAQs</a>
                <a href="../pages/gallery.php">Gallery</a>
            </div>
        </div>
    </nav>
</header>

<div class="container">

<div class="sidebar">
<h1>Northbound.</h1>

<p>The ultimate travel experience starts with a conversation. Let us curate your next adventure.</p>

<div class="contact-item">
<label>Email Us</label>
<span>karansharma@northbound-travel.com</span>
</div>

<div class="contact-item">
<label>Visit Office</label>
<span>Sec-17, Chandigarh, India</span>
</div>

<div class="contact-item">
<label>Call Support</label>
<span>+91 6280647885</span>
</div>

</div>

<div class="form-area">

<h2>Get in Touch</h2>

<form action="../backend/contact.php" method="POST">

<input type="text" name="name" placeholder="Your Name" required>
<input type="email" name="email" placeholder="Your Email" required>
<textarea name="message" placeholder="Tell us about your dream destination or ask a question..." required></textarea>

<button type="submit" class="btn-submit">Send My Inquiry</button>

</form>

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

// 🔥 ALERT SYSTEM
const urlParams = new URLSearchParams(window.location.search);

if(urlParams.get('success')){
alert("✅ Your message has been sent successfully!");
}

if(urlParams.get('error') === "empty"){
alert("⚠️ Please fill all fields");
}

if(urlParams.get('error') === "invalid_email"){
alert("❌ Invalid email format");
}

if(urlParams.get('error') === "failed"){
alert("❌ Something went wrong. Please try again.");
}

</script>

</body>
</html>