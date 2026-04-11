<?php
if(session_status() === PHP_SESSION_NONE){ session_start(); }
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include "../backend/db.php";
$result = mysqli_query($conn,"SELECT * FROM contact ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiries | NorthBound Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { --primary: #0f172a; --accent: #f59e0b; --bg: #f8fafc; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background: var(--bg); display: flex; }
        .sidebar { width: 280px; background: var(--primary); color: white; position: fixed; height: 100vh; display: flex; flex-direction: column; }
        .sidebar a { padding: 16px 25px; color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 15px; margin: 4px 15px; border-radius: 10px; transition: 0.3s; }
        .sidebar a.active { background: var(--accent); color: var(--primary); font-weight: 700; }
        
        .main-content { margin-left: 280px; flex: 1; padding: 50px; }
        .msg-bubble { background: #f1f5f9; padding: 15px; border-radius: 15px; border-left: 5px solid var(--accent); color: #334155; font-size: 14px; line-height: 1.6; }
        .table-card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.02); }
        table { width: 100%; border-collapse: separate; border-spacing: 0 15px; }
        th { padding: 0 20px; text-align: left; font-size: 12px; text-transform: uppercase; color: #64748b; }
        td { padding: 20px; background: white; border-top: 1px solid #f8fafc; border-bottom: 1px solid #f8fafc; vertical-align: top; }
        
        .user-name { font-size: 16px; color: var(--primary); font-weight: 700; display: block; margin-bottom: 4px; }
        .user-email { color: #3b82f6; font-size: 13px; text-decoration: none; display: block; margin-bottom: 8px; font-weight: 500; }
        .user-phone { color: var(--accent); font-weight: 700; font-size: 13px; display: block; }
        
        .del-btn { color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 10px; cursor: pointer; border: none; transition: 0.3s; }
        .del-btn:hover { background: #ef4444; color: white; }
        .logout { margin-top: auto; margin-bottom: 30px; color: #f87171 !important; }

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header" style="padding:40px 25px;"><h2>NorthBound</h2></div>
        <a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="bookings.php"><i class="fa-solid fa-map-location-dot"></i> Manage Bookings</a>
        <a href="enquiries.php" class="active"><i class="fa-solid fa-comment-dots"></i> Enquiries</a>
        <a href="javascript:void(0);" class="logout" onclick="confirmLogout();"><i class="fa-solid fa-power-off"></i> Logout</a>
    </div>

    <div class="main-content">
        <h1 style="margin-bottom: 30px; font-weight: 800;">Customer Inquiries</h1>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th width="30%">User Details</th>
                        <th width="60%">Message Details</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <span class="user-name"><?php echo htmlspecialchars($row['name']); ?></span>
                                <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="user-email">
                                    <i class="fa-solid fa-envelope" style="font-size: 11px;"></i> <?php echo htmlspecialchars($row['email']); ?>
                                </a>
                                <span class="user-phone">
                                    <i class="fa-solid fa-phone" style="font-size: 11px;"></i> <?php echo htmlspecialchars($row['phone'] ?? 'N/A'); ?>
                                </span>
                            </td>
                            <td>
                                <div class="msg-bubble">
                                    <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <button class="del-btn" onclick="confirmDelete(<?php echo $row['id']; ?>, 'enquiry')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="3" style="text-align: center; color: #64748b;">No enquiries found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function confirmDelete(id, type) {
        Swal.fire({
            title: 'Delete Enquiry?',
            text: "This message will be permanently removed.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            borderRadius: '15px'
        }).then((result) => { 
            if (result.isConfirmed) { 
                window.location.href = 'delete_' + type + '.php?id=' + id; 
            } 
        })
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