<?php
session_start();

// ✅ already logged in
if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}

// ✅ error message
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html>

<head>
<title>Admin Login</title>

<style>

body{
font-family:Arial;
background:#f4f6f8;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login-box{
background:white;
padding:40px;
border-radius:8px;
width:300px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

input{
width:100%;
padding:10px;
margin-bottom:15px;
}

button{
width:100%;
padding:12px;
background:#1a242f;
color:white;
border:none;
cursor:pointer;
}

/* 🔥 STYLISH ERROR BOX */
.error-box{
background: #ffe5e5;
color: #d8000c;
padding: 12px 15px;
border-left: 5px solid #ff4d4d;
border-radius: 5px;
margin-bottom: 15px;
font-size: 14px;
display: flex;
align-items: center;
gap: 10px;
animation: fadeIn 0.4s ease-in-out;
box-shadow: 0 3px 8px rgba(255,0,0,0.1);
}

.error-box span{
font-size: 18px;
}

@keyframes fadeIn {
from {opacity: 0; transform: translateY(-5px);}
to {opacity: 1; transform: translateY(0);}
}

</style>

</head>

<body>

<div class="login-box">

<h3>Admin Login</h3>

<!-- 🔥 STYLISH ERROR -->
<?php if($error == "invalid"){ ?>
    <div class="error-box">
        <span>⚠️</span>
        Invalid username or password
    </div>
<?php } ?>

<form action="login_process.php" method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</body>
</html>