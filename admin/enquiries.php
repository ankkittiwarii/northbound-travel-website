<?php

if(session_status() === PHP_SESSION_NONE){
session_start();
}

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

include "../backend/db.php";

$result = mysqli_query($conn,"SELECT * FROM contact ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Contact Enquiries</title>

<style>

body{
font-family:Arial;
background:#f4f6f8;
padding:40px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
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

a{
color:red;
text-decoration:none;
}

</style>

</head>

<body>

<h2>Contact Enquiries</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['message']; ?></td>

<td>

<a href="delete_enquiry.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</body>

</html>