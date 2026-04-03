<?php if(isset($_GET['deleted'])){ ?>
<script>alert("Booking deleted successfully ✅");</script>
<?php } ?>

<?php if(isset($_GET['error'])){ ?>
<script>alert("Delete failed ❌");</script>
<?php } ?>

<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../backend/db.php";

$result = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Travel Bookings</title>

<style>

body{
font-family:Arial;
background:#f4f6f8;
padding:40px;
}

h2{
margin-bottom:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
}

th,td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:left;
}

th{
background:#1a242f;
color:white;
}

tr:hover{
background:#f9f9f9;
}

.delete-btn{
color:red;
text-decoration:none;
font-weight:bold;
}

</style>

</head>

<body>

<h2>Travel Bookings</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Destination</th>
<th>Persons</th>
<th>Travel Date</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['destination']; ?></td>
<td><?php echo $row['persons']; ?></td>
<td><?php echo $row['travel_date']; ?></td>

<td>
<a class="delete-btn" href="delete_booking.php?id=<?php echo $row['id']; ?>" 
onclick="return confirm('Are you sure you want to delete this booking?');">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</body>

</html>