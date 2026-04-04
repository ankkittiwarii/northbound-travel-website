<?php

if(isset($_GET['deleted'])){ ?>
<script>alert("Booking deleted successfully ✅");</script>
<?php }

if(isset($_GET['error'])){ ?>
<script>alert("Delete failed ❌");</script>
<?php }

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

.no-data{
text-align:center;
padding:20px;
color:#777;
}

</style>

</head>

<body>

<h2>Travel Bookings</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Destination</th>
<th>Persons</th>
<th>Travel Date</th>
<th>Action</th>
</tr>

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo htmlspecialchars($row['id']); ?></td>
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['phone']); ?></td>
<td><?php echo htmlspecialchars($row['destination']); ?></td>
<td><?php echo htmlspecialchars($row['persons']); ?></td>
<td><?php echo htmlspecialchars($row['travel_date']); ?></td>

<td>
<a class="delete-btn" 
href="delete_booking.php?id=<?php echo $row['id']; ?>" 
onclick="return confirm('Are you sure you want to delete this booking?');">
Delete
</a>
</td>

</tr>

<?php } ?>

<?php } else { ?>

<tr>
<td colspan="8" class="no-data">No bookings found 🚫</td>
</tr>

<?php } ?>

</table>

</body>

</html>