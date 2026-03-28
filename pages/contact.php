<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact | Northbound</title>

<link rel="stylesheet" href="../assets/css/contact.css">
</head>

<script>
const urlParams = new URLSearchParams(window.location.search);

if(urlParams.get('success')){
alert("✅ Message sent!");
}
if(urlParams.get('error')){
alert("❌ Error occurred!");
}
</script>

<body>

<header>
<div class="logo"><img src="../assets/images/logoimage.jfif">NorthBound</div>
<nav>
<a href="../index.html">Home</a>
<a href="../pages/loginsignup.html">Login</a>
</nav>
</header>

<div class="container">

<form action="../backend/contact.php" method="POST" onsubmit="return checkLogin()">

<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<textarea name="message" required></textarea>

<button type="submit">Send</button>

</form>

</div>

<script>

// 🔥 LOGIN CHECK
function checkLogin(){

    var loggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    if(!loggedIn){
        alert("Login required!");

        window.location.href = "../pages/loginsignup.html?redirect=contact.php";
        return false;
    }

    return true;
}

</script>

</body>
</html>