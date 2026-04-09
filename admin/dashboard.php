<?php
if(session_status() === PHP_SESSION_NONE){ session_start(); }
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include "../backend/db.php";

$totalBookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM bookings"))['total'];
$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$totalEnquiries = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM contact"))['total'];
$adminName = htmlspecialchars($_SESSION['admin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NorthBound Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { --primary: #0f172a; --accent: #f59e0b; --bg: #f8fafc; --white: #ffffff; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background: var(--bg); display: flex; min-height: 100vh; }

        .sidebar { width: 280px; background: var(--primary); color: white; position: fixed; height: 100vh; display: flex; flex-direction: column; box-shadow: 4px 0 10px rgba(0,0,0,0.1); }
        .sidebar-header { padding: 40px 25px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar-header h2 { color: var(--accent); font-size: 24px; font-weight: 800; }
        .sidebar a { padding: 16px 25px; color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 15px; transition: 0.3s; margin: 4px 15px; border-radius: 10px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(245, 158, 11, 0.1); color: var(--accent); }
        .sidebar a.active { background: var(--accent); color: var(--primary); font-weight: 700; }
        .logout { margin-top: auto; margin-bottom: 30px; color: #f87171 !important; }

        .main-content { margin-left: 280px; flex: 1; padding: 50px; }
        .page-header h1 { font-size: 32px; font-weight: 800; color: var(--primary); margin-bottom: 10px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px; }
        .stat-card { background: var(--white); padding: 35px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 25px; border: 1px solid #f1f5f9; transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.05); }
        .stat-icon { width: 70px; height: 70px; border-radius: 18px; display: flex; justify-content: center; align-items: center; font-size: 28px; }
        .blue { background: #eff6ff; color: #3b82f6; }
        .green { background: #f0fdf4; color: #22c55e; }
        .orange { background: #fff7ed; color: #f59e0b; }
        .stat-info h3 { font-size: 14px; color: #64748b; text-transform: uppercase; letter-spacing: 1px; }
        .stat-info h2 { font-size: 36px; color: var(--primary); font-weight: 800; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header"><h2>NorthBound</h2></div>
        <a href="dashboard.php" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="bookings.php"><i class="fa-solid fa-map-location-dot"></i> Manage Bookings</a>
        <a href="enquiries.php"><i class="fa-solid fa-comment-dots"></i> Enquiries</a>
        <a href="javascript:void(0);" class="logout" onclick="confirmLogout();"><i class="fa-solid fa-power-off"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="page-header">
            <h1>Welcome back, <?php echo $adminName; ?> 👋</h1>
            <p style="color: #64748b;">Here's what's happening with your travel platform today.</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fa-solid fa-calendar-check"></i></div>
                <div class="stat-info"><h3>Total Bookings</h3><h2><?php echo $totalBookings; ?></h2></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fa-solid fa-user-group"></i></div>
                <div class="stat-info"><h3>Registered Users</h3><h2><?php echo $totalUsers; ?></h2></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange"><i class="fa-solid fa-envelope-open-text"></i></div>
                <div class="stat-info"><h3>Customer Enquiries</h3><h2><?php echo $totalEnquiries; ?></h2></div>
            </div>
        </div>
    </div>

    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Logout?',
            text: "Are you sure you want to end your session?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0f172a',
            cancelButtonColor: '#f87171',
            confirmButtonText: 'Yes, Logout',
            borderRadius: '15px'
        }).then((result) => { if (result.isConfirmed) { window.location.href = 'logout.php'; } })
    }
    </script>
</body>
</html>