<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Login & Sign Up</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/loginsignup.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<div class="page-wrapper">
    <div class="auth-container">
        
        <div class="auth-left">
            <div class="auth-left-content">
                <h1>Welcome to NorthBound.</h1>
                <p>Unlock exclusive travel deals, manage your bookings, and start your next Himalayan adventure today.</p>
            </div>
        </div>

        <div class="auth-right">
            
            <div id="loginForm" class="auth-form active">
                <span class="category-label">WELCOME BACK</span>
                <h2>Login to your account</h2>

                <form action="../backend/login.php" method="POST">
                    <div class="input-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="name@example.com" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>

                    <input type="hidden" name="redirect" id="redirectInput">

                    <button type="submit" class="auth-btn">Login</button>
                </form>

                <div class="switch">
                    Don't have an account? 
                    <a onclick="showSignup()">Create one</a>
                </div>
            </div>

            <div id="signupForm" class="auth-form">
                <span class="category-label">JOIN US</span>
                <h2>Create an account</h2>

                <form action="../backend/signup.php" method="POST">
                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="e.g. Karan Sharma" required>
                    </div>

                    <div class="input-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="name@example.com" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Create a strong password" required>
                    </div>

                    <button type="submit" class="auth-btn">Sign Up</button>
                </form>

                <div class="switch">
                    Already have an account? 
                    <a onclick="showLogin()">Login here</a>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="../assets/js/loginCheck.js"></script>
<script>
    // --- FORM TOGGLE LOGIC ---
    function showSignup(){
        document.getElementById("loginForm").classList.remove("active");
        document.getElementById("signupForm").classList.add("active");
    }

    function showLogin(){
        document.getElementById("signupForm").classList.remove("active");
        document.getElementById("loginForm").classList.add("active");
    }

    // --- REDIRECT HANDLING ---
    const params = new URLSearchParams(window.location.search);
    const redirect = params.get("redirect");

    if(redirect){
        document.getElementById("redirectInput").value = redirect;
    }

    // --- ERROR & SUCCESS HANDLING ---
    const error = params.get("error");
    if(error === "empty"){
        alert("⚠️ All fields are required.");
    }
    if(error === "wrongpass"){
        alert("❌ Incorrect Password. Please try again.");
    }
    if(error === "nouser"){
        alert("❌ No user found with this email address.");
    }
    if(error === "email_exists"){
        alert("⚠️ This email is already registered. Please log in.");
    }

    const success = params.get("success");
    if(success === "signup"){
        alert("✅ Signup successful! Please log in with your new credentials.");
    }
</script>

</body>
</html>