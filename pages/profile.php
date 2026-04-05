<?php
session_start();

// Redirect to login if the user is not authenticated
if(!isset($_SESSION['user_id'])){
    header("Location: loginsignup.php?redirect=profile.php");
    exit();
}

// Fallback values if session data is missing for some reason
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Traveler";
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "your.email@example.com";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="profile-section">
    <div class="profile-header-bg"></div>

    <div class="profile-container">
        
        <aside class="profile-sidebar">
            <div class="user-avatar-section">
                <div class="avatar-circle">
                    <?php echo strtoupper(substr($userName, 0, 1)); ?>
                </div>
                <h3><?php echo htmlspecialchars($userName); ?></h3>
                <span class="member-badge">NorthBound Member</span>
            </div>

            <nav class="profile-nav">
                <a href="profile.php" class="active"><i class="fa-solid fa-user"></i> Personal Info</a>
                <a href="my_bookings.php"><i class="fa-solid fa-suitcase-rolling"></i> My Bookings</a>
                <a href="saved_packages.php"><i class="fa-solid fa-heart"></i> Saved Packages</a>
                <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                <a href="../backend/logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </aside>

        <main class="profile-content">
            <div class="content-header">
                <h2>Personal Information</h2>
                <p>Manage your personal details and how we can contact you.</p>
            </div>

            <form action="../backend/update_profile.php" method="POST" class="profile-form">
                
                <div class="input-row">
                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($userName); ?>" required>
                    </div>
                    <div class="input-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="+91 XXXXX XXXXX">
                    </div>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($userEmail); ?>" readonly title="Email cannot be changed directly">
                    <small class="helper-text">To change your email, please contact support.</small>
                </div>

                <hr class="divider">

                <div class="content-header">
                    <h2>Change Password</h2>
                    <p>Leave blank if you do not wish to change your password.</p>
                </div>

                <div class="input-row">
                    <div class="input-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" placeholder="••••••••">
                    </div>
                    <div class="input-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="••••••••">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">Save Changes</button>
                    <button type="reset" class="btn-cancel">Cancel</button>
                </div>

            </form>
        </main>

    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

</body>
</html>