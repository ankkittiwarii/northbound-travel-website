<?php

if(session_status() === PHP_SESSION_NONE){
session_start();
}

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f4f6f8;
}

.sidebar{
width:220px;
height:100vh;
background:#1a242f;
color:white;
position:fixed;
padding-top:20px;
}

.sidebar h2{
text-align:center;
margin-bottom:30px;
}

.sidebar a{
display:block;
padding:15px 20px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#ff4d00;
}

.main{
margin-left:220px;
padding:40px;
}

.card{
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
margin-bottom:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Northbound</h2>

<a href="dashboard.php">Dashboard</a>
<a href="bookings.php">Bookings</a>
<a href="enquiries.php">Enquiries</a>
<a href="logout.php">Logout</a>

</div>

<div class="main">

<div class="card">
<h2>Admin Dashboard</h2>
<p>Welcome Admin 👋</p>
</div>

<div class="card">
<h3>Manage Website</h3>
<p>Use the sidebar to manage bookings and enquiries.</p>
</div>

</div>

</body>
</html>