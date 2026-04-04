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

<h2>Contact Enquiries</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Action</th>
</tr>

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo htmlspecialchars($row['id']); ?></td>
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['message']); ?></td>

<td>
<a class="delete-btn" 
href="delete_enquiry.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this enquiry?');">
Delete
</a>
</td>

</tr>

<?php } ?>

<?php } else { ?>

<tr>
<td colspan="5" class="no-data">No enquiries found 🚫</td>
</tr>

<?php } ?>

</table>

</body>

</html>