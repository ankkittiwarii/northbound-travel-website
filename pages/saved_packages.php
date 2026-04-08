<?php
session_start();

// Redirect to login if the user is not authenticated
if(!isset($_SESSION['user_id'])){
    header("Location: loginsignup.php?redirect=saved_packages.php");
    exit();
}

$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Traveler";

// --- MOCK DATA: Replace this with an actual database query later ---
$savedPackages = [
    [
        "id" => "gulmarg",
        "title" => "Adventure in Gulmarg",
        "location" => "Kashmir",
        "duration" => "5 Days / 4 Nights",
        "price" => "16,500",
        "image" => "../assets/images/gulmargpackage.webp"
    ],
    [
        "id" => "jaisalmer",
        "title" => "Golden Jaisalmer",
        "location" => "Rajasthan",
        "duration" => "3 Days / 2 Nights",
        "price" => "13,500",
        "image" => "../assets/images/jaisalmerpackage.webp"
    ],
    [
        "id" => "ladakh",
        "title" => "Mystic Leh Ladakh",
        "location" => "Ladakh",
        "duration" => "6 Days / 5 Nights",
        "price" => "25,999",
        "image" => "../assets/images/ladakhpackage.webp"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Saved Packages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/profile.css"> 
    <link rel="stylesheet" href="../assets/css/saved_packages.css">
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
                <!-- <a href="profile.php"><i class="fa-solid fa-user"></i> Personal Info</a> -->
                <a href="my_bookings.php"><i class="fa-solid fa-suitcase-rolling"></i> My Bookings</a>
                <a href="saved_packages.php" class="active"><i class="fa-solid fa-heart"></i> Saved Packages</a>
                <!-- <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a> -->
                <a href="../backend/logout.php" class="logout-link" onclick="return confirm('Are you sure you want to logout?');"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </nav>
        </aside>

        <main class="profile-content">
            <div class="content-header">
                <h2>Saved Packages</h2>
                <p>Your personal wishlist. Packages you've saved for your future adventures.</p>
            </div>

            <div class="saved-grid">
                <?php if(empty($savedPackages)) { ?>
                    <div class="empty-state">
                        <i class="fa-regular fa-heart"></i>
                        <h3>Your wishlist is empty</h3>
                        <p>Keep track of your dream destinations by saving them here.</p>
                        <a href="packages.php" class="btn-browse">Explore Packages</a>
                    </div>
                <?php } else { ?>
                    
                    <?php foreach($savedPackages as $pkg) { ?>
                        <div class="saved-card" id="pkg-<?php echo htmlspecialchars($pkg['id']); ?>">
                            <div class="saved-img-wrapper">
                                <img src="<?php echo htmlspecialchars($pkg['image']); ?>" alt="<?php echo htmlspecialchars($pkg['title']); ?>">
                                <button class="btn-remove-icon" onclick="removePackage('<?php echo htmlspecialchars($pkg['id']); ?>')" title="Remove from Saved">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                            
                            <div class="saved-info">
                                <span class="saved-location"><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($pkg['location']); ?></span>
                                <h3><?php echo htmlspecialchars($pkg['title']); ?></h3>
                                <p class="saved-duration"><i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($pkg['duration']); ?></p>
                                
                                <div class="saved-footer">
                                    <div class="price">
                                        <span>Starting from</span>
                                        <h4>₹<?php echo htmlspecialchars($pkg['price']); ?></h4>
                                    </div>
                                    <a href="booking.php?package=<?php echo htmlspecialchars($pkg['id']); ?>" class="btn-book-now">Book Now</a>
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
<script>
    // Visual effect to remove a package from the screen (Needs backend connection later)
    function removePackage(pkgId) {
        if(confirm("Remove this package from your saved list?")) {
            const card = document.getElementById('pkg-' + pkgId);
            
            // Add a fade-out animation
            card.style.transition = "opacity 0.3s ease, transform 0.3s ease";
            card.style.opacity = "0";
            card.style.transform = "scale(0.95)";
            
            // Remove from DOM after animation completes
            setTimeout(() => {
                card.remove();
                
                // Check if grid is empty now, if so, reload to show empty state
                const grid = document.querySelector('.saved-grid');
                if(grid.children.length === 0) {
                    location.reload(); 
                }
            }, 300);

            // TODO: Add AJAX/Fetch call here to actually remove it from your database
            /*
            fetch('../backend/remove_saved.php?id=' + pkgId)
                .then(response => response.json())
                .then(data => console.log(data));
            */
        }
    }
</script>

</body>
</html>