<?php
if(session_status() === PHP_SESSION_NONE){ session_start(); }
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include "../backend/db.php";
// Booking data fetch kar rahe hain
$result = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings | NorthBound Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { --primary: #0f172a; --accent: #f59e0b; --bg: #f8fafc; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background: var(--bg); display: flex; }
        .sidebar { width: 280px; background: var(--primary); color: white; position: fixed; height: 100vh; display: flex; flex-direction: column; }
        .sidebar-header { padding: 40px 25px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar a { padding: 16px 25px; color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 15px; margin: 4px 15px; border-radius: 10px; transition: 0.3s; }
        .sidebar a.active { background: var(--accent); color: var(--primary); font-weight: 700; }
        
        .main-content { margin-left: 280px; flex: 1; padding: 50px; }
        .table-card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.02); border: 1px solid #f1f5f9; }
        table { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
        th { padding: 15px; text-align: left; font-size: 12px; text-transform: uppercase; color: #64748b; letter-spacing: 1px; }
        td { padding: 20px; background: white; border-top: 1px solid #f8fafc; border-bottom: 1px solid #f8fafc; }

        .user-info strong { font-size: 16px; color: var(--primary); display: block; }
        .user-info .email { color: #3b82f6; font-size: 13px; text-decoration: none; display: block; margin: 2px 0; }
        .user-info .phone { color: #64748b; font-size: 12px; font-weight: 600; }
        
        .dest-badge { background: #fff7ed; color: #c2410c; padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 12px; display: inline-block; margin-bottom: 5px; }
        .price-tag { color: #16a34a; font-weight: 800; font-size: 16px; }
        .del-btn { color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 10px; cursor: pointer; border: none; transition: 0.3s; }
        .del-btn:hover { background: #ef4444; color: white; }
        .logout { margin-top: auto; margin-bottom: 30px; color: #f87171 !important; }

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header"><h2>NorthBound</h2></div>
        <a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="bookings.php" class="active"><i class="fa-solid fa-map-location-dot"></i> Manage Bookings</a>
        <a href="enquiries.php"><i class="fa-solid fa-comment-dots"></i> Enquiries</a>
        <a href="javascript:void(0);" class="logout" onclick="confirmLogout();"><i class="fa-solid fa-power-off"></i> Logout</a>
    </div>

    <div class="main-content">
        <h1 style="margin-bottom: 30px; font-weight: 800;">Recent Bookings</h1>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Details</th>
                        <th>Package Info</th>
                        <th>Travel Date</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td style="color:#94a3b8; font-weight:700;">#<?php echo $row['id']; ?></td>
                            <td class="user-info">
                                <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                                <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="email">
                                    <i class="fa-regular fa-envelope"></i> <?php echo htmlspecialchars($row['email']); ?>
                                </a>
                                <span class="phone"><i class="fa-solid fa-phone"></i> <?php echo htmlspecialchars($row['phone']); ?></span>
                            </td>
                            <td>
                                <span class="dest-badge"><?php echo htmlspecialchars($row['destination']); ?></span><br>
                                <small><?php echo htmlspecialchars($row['package'] ?? 'N/A'); ?> (<?php echo $row['persons']; ?> Pax)</small>
                            </td>
                            <td><i class="fa-regular fa-calendar" style="opacity:0.5;"></i> <?php echo date('d M, Y', strtotime($row['travel_date'])); ?></td>
                            <td class="price-tag">₹<?php echo number_format($row['total_price'] ?? 0); ?></td>
                            <td>
                                <button class="del-btn" onclick="confirmDelete(<?php echo $row['id']; ?>, 'booking')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" style="text-align: center; color: #64748b; padding: 40px;">No bookings found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function confirmDelete(id, type) {
        Swal.fire({
            title: 'Delete Booking?',
            text: "This record will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Yes, Delete It',
            borderRadius: '15px'
        }).then((result) => { if (result.isConfirmed) { window.location.href = 'delete_' + type + '.php?id=' + id; } })
    }
    </script>
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