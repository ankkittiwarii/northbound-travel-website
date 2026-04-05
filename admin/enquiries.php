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
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Enquiries | NorthBound</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Inherit exact layout from bookings */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background: #f3f4f6; color: #334155; display: flex; min-height: 100vh; }
    
    .sidebar { width: 260px; background: #0f172a; color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; box-shadow: 4px 0 15px rgba(0,0,0,0.1); }
    .sidebar-header { padding: 30px 20px; text-align: center; border-bottom: 1px solid #1e293b; margin-bottom: 20px; }
    .sidebar-header h2 { color: #f59e0b; font-size: 24px; font-weight: 800; letter-spacing: 1px; }
    .sidebar-header p { color: #94a3b8; font-size: 13px; margin-top: 5px; }
    .sidebar a { padding: 15px 25px; color: #cbd5e1; text-decoration: none; font-size: 15px; font-weight: 500; display: flex; align-items: center; gap: 15px; transition: all 0.3s; border-left: 4px solid transparent; }
    .sidebar a i { width: 20px; text-align: center; font-size: 18px; }
    .sidebar a:hover, .sidebar a.active { background: #1e293b; color: #fff; border-left-color: #f59e0b; }
    .sidebar .logout { margin-top: auto; border-top: 1px solid #1e293b; color: #ef4444; }
    
    .main-content { margin-left: 260px; flex: 1; padding: 40px; }
    .page-header { margin-bottom: 30px; }
    .page-header h1 { color: #0f172a; font-size: 32px; font-weight: 800; }
    
    .table-container { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 18px 20px; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 14.5px; }
    th { background: #f8fafc; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 12px; letter-spacing: 0.5px; }
    tr:hover { background: #f1f5f9; }
    tr:last-child td { border-bottom: none; }
    
    .message-cell { max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #64748b; }
    
    .delete-btn { display: inline-block; background: #fee2e2; color: #dc2626; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 13px; transition: all 0.3s; }
    .delete-btn:hover { background: #ef4444; color: white; }
    .no-data { text-align: center; padding: 40px; color: #94a3b8; font-size: 16px; font-style: italic; }

    .alert { padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; display: flex; align-items: center; gap: 10px; }
    .alert-success { background: #dcfce7; color: #059669; border: 1px solid #a7f3d0; }
    .alert-error { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
</style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>NorthBound</h2>
        <p>Admin Control Panel</p>
    </div>
    <a href="dashboard.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
    <a href="bookings.php"><i class="fa-solid fa-suitcase-rolling"></i> Manage Bookings</a>
    <a href="enquiries.php" class="active"><i class="fa-solid fa-envelope"></i> Contact Enquiries</a>
    <a href="logout.php" class="logout" onclick="return confirm('Logout?');"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main-content">
    <div class="page-header">
        <h1>Contact Enquiries</h1>
    </div>

    <?php if(isset($_GET['deleted'])){ ?>
        <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> Enquiry deleted successfully.</div>
    <?php } ?>
    <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-error"><i class="fa-solid fa-triangle-exclamation"></i> Action failed. Please try again.</div>
    <?php } ?>

    <div class="table-container">
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
                    <td><strong>#<?php echo htmlspecialchars($row['id']); ?></strong></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" style="color: #f59e0b; text-decoration: none; font-weight: 600;"><?php echo htmlspecialchars($row['email']); ?></a></td>
                    <td class="message-cell" title="<?php echo htmlspecialchars($row['message']); ?>">
                        <?php echo htmlspecialchars($row['message']); ?>
                    </td>
                    <td>
                        <a class="delete-btn" href="delete_enquiry.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this enquiry? This cannot be undone.');">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="no-data"><i class="fa-solid fa-envelope-open"></i> No new enquiries.</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>