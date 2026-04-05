<?php
session_start();

// Redirect to login if the user is not authenticated
if(!isset($_SESSION['user_id'])){
    header("Location: loginsignup.php?redirect=my_bookings.php");
    exit();
}

$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Traveler";

// --- MOCK DATA: Replace this with an actual database query later ---
$bookings = [
    [
        "booking_id" => "NB-784920",
        "package_name" => "Adventure in Gulmarg",
        "travel_dates" => "12 Feb 2024 - 16 Feb 2024",
        "guests" => 2,
        "total_price" => "33,000",
        "status" => "Upcoming",
        "image" => "../assets/images/gulmargpackage.webp"
    ],
    [
        "booking_id" => "NB-459102",
        "package_name" => "Spiritual Dharamshala",
        "travel_dates" => "05 Oct 2023 - 08 Oct 2023",
        "guests" => 4,
        "total_price" => "50,000",
        "status" => "Completed",
        "image" => "../assets/images/dharamshalapackage.webp"
    ],
    [
        "booking_id" => "NB-102834",
        "package_name" => "Golden Jaisalmer",
        "travel_dates" => "20 Nov 2023 - 22 Nov 2023",
        "guests" => 2,
        "total_price" => "27,000",
        "status" => "Cancelled",
        "image" => "../assets/images/jaisalmerpackage.webp"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - My Bookings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/profile.css"> 
    <link rel="stylesheet" href="../assets/css/my_bookings.css">
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
                <a href="my_bookings.php" class="active"><i class="fa-solid fa-suitcase-rolling"></i> My Bookings</a>
                <a href="saved_packages.php"><i class="fa-solid fa-heart"></i> Saved Packages</a>
                <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                <a href="../backend/logout.php" class="logout-link" onclick="return confirm('Are you sure you want to logout?');"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </nav>
        </aside>

        <main class="profile-content">
            <div class="content-header">
                <h2>My Bookings</h2>
                <p>Manage your upcoming trips and review your past adventures.</p>
            </div>

            <div class="bookings-list">
                <?php if(empty($bookings)) { ?>
                    <div class="empty-state">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <h3>No bookings yet!</h3>
                        <p>It looks like you haven't booked your next adventure. Explore our packages and start packing!</p>
                        <a href="packages.php" class="btn-browse">Browse Packages</a>
                    </div>
                <?php } else { ?>
                    
                    <?php foreach($bookings as $booking) { 
                        // Determine the CSS class based on the status
                        $statusClass = strtolower($booking['status']); 
                    ?>
                        <div class="booking-card">
                            <div class="booking-img-wrapper">
                                <img src="<?php echo htmlspecialchars($booking['image']); ?>" alt="<?php echo htmlspecialchars($booking['package_name']); ?>">
                            </div>
                            
                            <div class="booking-info">
                                <div class="booking-header">
                                    <span class="booking-id">ID: <?php echo htmlspecialchars($booking['booking_id']); ?></span>
                                    <span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($booking['status']); ?></span>
                                </div>
                                
                                <h3><?php echo htmlspecialchars($booking['package_name']); ?></h3>
                                
                                <div class="booking-details-grid">
                                    <div class="detail-item">
                                        <i class="fa-regular fa-calendar"></i>
                                        <div>
                                            <small>Travel Dates</small>
                                            <span><?php echo htmlspecialchars($booking['travel_dates']); ?></span>
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fa-solid fa-user-group"></i>
                                        <div>
                                            <small>Guests</small>
                                            <span><?php echo htmlspecialchars($booking['guests']); ?> Travelers</span>
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fa-solid fa-wallet"></i>
                                        <div>
                                            <small>Total Amount</small>
                                            <span class="price">₹<?php echo htmlspecialchars($booking['total_price']); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-actions">
                                    <button class="btn-view">View Itinerary</button>
                                    <?php if($booking['status'] === "Upcoming") { ?>
                                        <button class="btn-cancel-booking">Cancel Booking</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } ?>
            </div>
        </main>

    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

</body>
</html>