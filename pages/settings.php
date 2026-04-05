<?php
session_start();

// Redirect to login if the user is not authenticated
if(!isset($_SESSION['user_id'])){
    header("Location: loginsignup.php?redirect=settings.php");
    exit();
}

$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Traveler";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Account Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/profile.css"> 
    <link rel="stylesheet" href="../assets/css/settings.css">
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
                <a href="profile.php"><i class="fa-solid fa-user"></i> Personal Info</a>
                <a href="my_bookings.php"><i class="fa-solid fa-suitcase-rolling"></i> My Bookings</a>
                <a href="saved_packages.php"><i class="fa-solid fa-heart"></i> Saved Packages</a>
                <a href="settings.php" class="active"><i class="fa-solid fa-gear"></i> Settings</a>
                <a href="../backend/logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </aside>

        <main class="profile-content">
            <div class="content-header">
                <h2>Account Settings</h2>
                <p>Manage your preferences, notifications, and account security.</p>
            </div>

            <form action="../backend/update_settings.php" method="POST" class="settings-form">
                
                <div class="settings-block">
                    <h3><i class="fa-solid fa-globe"></i> Regional Preferences</h3>
                    
                    <div class="input-row">
                        <div class="input-group">
                            <label>Preferred Currency</label>
                            <select name="currency" class="settings-select">
                                <option value="INR" selected>₹ Indian Rupee (INR)</option>
                                <option value="USD">$ US Dollar (USD)</option>
                                <option value="EUR">€ Euro (EUR)</option>
                                <option value="GBP">£ British Pound (GBP)</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>Language</label>
                            <select name="language" class="settings-select">
                                <option value="en" selected>English</option>
                                <option value="hi">Hindi (हिंदी)</option>
                                <option value="fr">French (Français)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-block">
                    <h3><i class="fa-solid fa-bell"></i> Notifications</h3>
                    
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Booking Updates</h4>
                            <p>Get emails about your upcoming trip details and itinerary changes.</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="notif_booking" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Special Offers & Promos</h4>
                            <p>Receive exclusive deals, flash sales, and personalized travel recommendations.</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="notif_promo">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>SMS Alerts</h4>
                            <p>Receive important day-of-travel updates via text message.</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="notif_sms" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                <div class="settings-block">
                    <h3><i class="fa-solid fa-shield-halved"></i> Security</h3>
                    
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Two-Factor Authentication (2FA)</h4>
                            <p>Add an extra layer of security to your NorthBound account.</p>
                        </div>
                        <button type="button" class="btn-outline-action">Enable 2FA</button>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">Save Settings</button>
                </div>
            </form>

            <hr class="divider">

            <div class="danger-zone">
                <h3>Danger Zone</h3>
                <div class="setting-item">
                    <div class="setting-info">
                        <h4 class="text-danger">Delete Account</h4>
                        <p>Permanently delete your account and all associated booking history. This action cannot be undone.</p>
                    </div>
                    <button type="button" class="btn-danger" onclick="confirmDeletion()">Delete Account</button>
                </div>
            </div>

        </main>

    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>
<script>
    function confirmDeletion() {
        if(confirm("Are you absolutely sure you want to delete your account? This action cannot be reversed and you will lose all your saved packages and booking history.")) {
            // Add AJAX call or redirect to delete_account.php here
            alert("Account deletion request initiated. Please check your email to confirm.");
        }
    }
</script>

</body>
</html>