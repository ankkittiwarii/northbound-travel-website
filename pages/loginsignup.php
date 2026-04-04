<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Northbound</title>

<link rel="stylesheet" href="../assets/css/loginsignup.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
        <div class="logo"><img src="../assets/images/logoimage.jfif" alt="logo">NorthBound</div>
        <nav>
            <a href="../index.php">Home</a>
            <!-- <a href="../pages/loginsignup.php">Login</a> -->
            <a href="../pages/destination.php">Destinations</a>
            <a href="../pages/Hotels.php">Hotels</a>
            <a href="../pages/activities.php">Activities</a>
            <a href="../pages/packages.php">Packages</a>
            <a href="../pages/booking.php" onclick="checkLogin('booking.php')">Bookings</a>
            <a href="../pages/contact.php" onclick="checkLogin('contact.php')">Contact</a>
            
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

<div class="left">
<h1>Welcome to Northbound Travel</h1>
<p>Your journey begins here</p>
</div>

<div class="right">

<!-- LOGIN FORM -->

<div id="loginForm" class="form active">

<h2>Login</h2>

<form action="../backend/login.php" method="POST">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<!-- 🔥 IMPORTANT: redirect hidden field -->
<input type="hidden" name="redirect" id="redirectInput">

<button type="submit">Login</button>

</form>

<div class="switch">
Don't have an account? 
<a onclick="showSignup()">Sign Up</a>
</div>

</div>

<!-- SIGNUP FORM -->

<div id="signupForm" class="form">

<h2>Create Account</h2>

<form action="../backend/signup.php" method="POST">

<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Sign Up</button>

</form>

<div class="switch">
Already have an account? 
<a onclick="showLogin()">Login</a>
</div>

</div>

</div>
</div>

<script>
function checkLogin(page){

    const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

    if(isLoggedIn === "yes"){
        window.location.href = page;
    } else {
        if(confirm("⚠️ Login required to continue")){
            window.location.href = "../pages/loginsignup.php?redirect=" + page;
        }
    }
}


// form toggle
function showSignup(){
document.getElementById("loginForm").classList.remove("active");
document.getElementById("signupForm").classList.add("active");
}

function showLogin(){
document.getElementById("signupForm").classList.remove("active");
document.getElementById("loginForm").classList.add("active");
}

// redirect handle
const params = new URLSearchParams(window.location.search);
const redirect = params.get("redirect");

if(redirect){
    document.getElementById("redirectInput").value = redirect;
}

// 🔥 ERROR HANDLING (ADD THIS)
const error = params.get("error");

if(error === "empty"){
    alert("All fields are required ⚠️");
}

if(error === "wrongpass"){
    alert("Wrong Password ❌");
}

if(error === "nouser"){
    alert("User not found ❌");
}

// success
const success = params.get("success");

if(success === "signup"){
    alert("Signup successful ✅ Please login");
}

</script>

</body>
</html>