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

$adminName = htmlspecialchars($_SESSION['admin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard | NorthBound</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background: #f3f4f6; color: #334155; display: flex; min-height: 100vh; }
    
    /* ===== SIDEBAR ===== */
    .sidebar { width: 260px; background: #0f172a; color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; box-shadow: 4px 0 15px rgba(0,0,0,0.1); }
    .sidebar-header { padding: 30px 20px; text-align: center; border-bottom: 1px solid #1e293b; margin-bottom: 20px; }
    .sidebar-header h2 { color: #f59e0b; font-size: 24px; font-weight: 800; letter-spacing: 1px; }
    .sidebar-header p { color: #94a3b8; font-size: 13px; margin-top: 5px; }
    
    .sidebar a { padding: 15px 25px; color: #cbd5e1; text-decoration: none; font-size: 15px; font-weight: 500; display: flex; align-items: center; gap: 15px; transition: all 0.3s; border-left: 4px solid transparent; }
    .sidebar a i { width: 20px; text-align: center; font-size: 18px; }
    .sidebar a:hover, .sidebar a.active { background: #1e293b; color: #fff; border-left-color: #f59e0b; }
    .sidebar .logout { margin-top: auto; border-top: 1px solid #1e293b; color: #ef4444; }
    .sidebar .logout:hover { background: #fef2f2; color: #dc2626; border-left-color: #ef4444; }

    /* ===== MAIN CONTENT ===== */
    .main-content { margin-left: 260px; flex: 1; padding: 40px; }
    .page-header { margin-bottom: 40px; }
    .page-header h1 { color: #0f172a; font-size: 32px; font-weight: 800; }
    .page-header p { color: #64748b; font-size: 16px; margin-top: 5px; }

    /* ===== STATS GRID ===== */
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 40px; }
    .stat-card { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; display: flex; align-items: center; gap: 20px; transition: transform 0.3s; }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
    .stat-icon { width: 60px; height: 60px; border-radius: 12px; background: #fffbeb; color: #f59e0b; display: flex; justify-content: center; align-items: center; font-size: 24px; }
    .stat-info h3 { font-size: 14px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px; }
    .stat-info h2 { font-size: 32px; color: #0f172a; font-weight: 800; }
</style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>NorthBound</h2>
        <p>Admin Control Panel</p>
    </div>
    <a href="dashboard.php" class="active"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
    <a href="bookings.php"><i class="fa-solid fa-suitcase-rolling"></i> Manage Bookings</a>
    <a href="enquiries.php"><i class="fa-solid fa-envelope"></i> Contact Enquiries</a>
    <a href="logout.php" class="logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main-content">
    <div class="page-header">
        <h1>Welcome Back, <?php echo $adminName; ?> 👋</h1>
        <p>Here is an overview of your platform today.</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-ticket"></i></div>
            <div class="stat-info">
                <h3>Total Bookings</h3>
                <h2><?php echo $totalBookings; ?></h2>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
            <div class="stat-info">
                <h3>Registered Users</h3>
                <h2><?php echo $totalUsers; ?></h2>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-messages"></i></div>
            <div class="stat-info">
                <h3>Contact Enquiries</h3>
                <h2><?php echo $totalEnquiries; ?></h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>