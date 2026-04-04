<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../backend/db.php";

// ✅ safe queries
$result1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM bookings");
$totalBookings = mysqli_fetch_assoc($result1)['total'];

$result2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$totalUsers = mysqli_fetch_assoc($result2)['total'];

$result3 = mysqli_query($conn, "SELECT COUNT(*) as total FROM contact");
$totalEnquiries = mysqli_fetch_assoc($result3)['total'];

// ✅ admin name
$adminName = htmlspecialchars($_SESSION['admin']);
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

.stats{
display:flex;
gap:20px;
flex-wrap:wrap;
}

.stat-box{
flex:1;
min-width:200px;
background:white;
padding:20px;
border-radius:8px;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
text-align:center;
}

.stat-box h2{
margin:10px 0;
color:#ff4d00;
}

</style>

<script>
// ✅ logout confirmation
function confirmLogout(){
    return confirm("Are you sure you want to logout?");
}
</script>

</head>

<body>

<div class="sidebar">

<h2>Northbound</h2>

<a href="dashboard.php">Dashboard</a>
<a href="bookings.php">Bookings</a>
<a href="enquiries.php">Enquiries</a>
<a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<div class="main">

<div class="card">
<h2>Admin Dashboard</h2>
<p>Welcome, <?php echo $adminName; ?> 👋</p>
</div>

<div class="stats">

<div class="stat-box">
<h3>Total Bookings</h3>
<h2><?php echo $totalBookings; ?></h2>
</div>

<div class="stat-box">
<h3>Total Users</h3>
<h2><?php echo $totalUsers; ?></h2>
</div>

<div class="stat-box">
<h3>Total Enquiries</h3>
<h2><?php echo $totalEnquiries; ?></h2>
</div>

</div>

<div class="card">
<h3>Manage Website</h3>
<p>Use the sidebar to manage bookings and enquiries.</p>
</div>

</div>

</body>
</html>