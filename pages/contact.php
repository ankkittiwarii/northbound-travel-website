<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NorthBound - Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="contact-section">
    <div class="contact-header">
        <span class="category-label">REACH OUT</span>
        <h2>Contact Us</h2>
        <p>The ultimate travel experience starts with a conversation. Let us curate your next adventure.</p>
    </div>

    <div class="container">
        
        <div class="sidebar">
            <h3>Contact Information</h3>
            <p>Fill out the form and our travel experts will get back to you within 24 hours.</p>

            <div class="contact-info">
                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <label>Email Us</label>
                        <span>northbound123@gmail.com</span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <label>Visit Office</label>
                        <span>Sec-17, Chandigarh, India</span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <label>Call Support</label>
                        <span>6283688141, 6280647885, 7526934093</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-area">
            <h2>Send us a Message</h2>
            <form action="../backend/contact.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : ''; ?>">

                <div class="input-group">
                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="e.g. Ankit Tiwari" required>
                </div>
                
                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="+91 6283******" required>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="ankit@example.com" required>
                </div>

                <div class="input-group">
                    <label>Message</label>
                    <textarea name="message" placeholder="Tell us about your dream destination or ask a question..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Send Inquiry</button>
            </form>
        </div>

    </div>
</section>

<script src="../assets/js/loginCheck.js"></script>

<script>
const urlParams = new URLSearchParams(window.location.search);
if(urlParams.get('success')){ alert("✅ Message sent! We'll contact you soon."); }
if(urlParams.get('error')){ alert("❌ Something went wrong. Please try again."); }
</script>

</body>
</html>