<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
// Base path setup
$base = "/northbound-travel-website/";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<header class="main-header">
    <div class="logo">
        <a href="<?php echo $base; ?>index.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
            <img src="<?php echo $base; ?>assets/images/logoimage.jfif" alt="NorthBound Logo">
            <span>NorthBound</span>
        </a>
    </div>

    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <nav class="nav-links">
        <a href="<?php echo $base; ?>index.php">Home</a>
        <a href="<?php echo $base; ?>pages/destination.php">Destinations</a>
        <a href="<?php echo $base; ?>pages/Hotels.php">Hotels</a>
        <a href="<?php echo $base; ?>pages/activities.php">Activities</a>

        <a href="javascript:void(0)" onclick="checkLogin('<?php echo $base; ?>pages/booking.php')">Bookings</a>
        <a href="javascript:void(0)" onclick="checkLogin('<?php echo $base; ?>pages/contact.php')">Contact</a>

        <div class="dropdown">
            <span class="dropbtn">More <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></span>
            <div class="dropdown-content">
                <a href="<?php echo $base; ?>pages/packages.php">Packages</a>
                <a href="<?php echo $base; ?>pages/Special.php">Special Offers</a>
                <a href="<?php echo $base; ?>pages/blog.php">Blogs</a>
                <a href="<?php echo $base; ?>pages/faq.php">FAQs</a>
                <a href="<?php echo $base; ?>pages/gallery.php">Gallery</a>
            </div>
        </div>

        <?php if(isset($_SESSION['user_id'])) { ?>
        <div class="dropdown">
            <span class="user-name">👋 <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?> <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></span>
            <div class="dropdown-content">
                <a href="<?php echo $base; ?>backend/logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?');">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>           
            </div>
        </div>
        <?php } else { ?>
        <a href="<?php echo $base; ?>pages/loginsignup.php" class="login-btn">
            Login / SignUp
        </a>
        <?php } ?>
    </nav>
</header>

<script>
    window.userIsLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
</script>

<script>
    // Mobile Menu Toggle
    document.getElementById('mobile-menu').addEventListener('click', function() {
        document.querySelector('.nav-links').classList.toggle('active');
        this.classList.toggle('is-active');
    });
</script>