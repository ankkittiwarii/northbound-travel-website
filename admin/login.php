<?php
session_start();

if(isset($_SESSION['admin'])){
header("Location: dashboard.php");
}
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

</style>

</head>

<body>

<div class="login-box">

<h3>Admin Login</h3>

<form action="login_process.php" method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</body>
</html>