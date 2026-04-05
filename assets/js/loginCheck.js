// function checkLogin(page){

//     const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

//     if(isLoggedIn === "yes"){
//         window.location.href = page;
//     } else {
//         if(confirm("⚠️ Login required to continue")){
//             window.location.href = "/northbound-travel-website/pages/loginsignup.php?redirect=" + page.split('/').pop();
//         }
//     }
// }


/**
 * Checks if the user is logged in before redirecting them to a secure page.
 * Relies on the 'window.userIsLoggedIn' variable set by navbar.php.
 */
function checkLogin(page) {
    // Check the global variable set by PHP
    if (typeof window.userIsLoggedIn !== 'undefined' && window.userIsLoggedIn === true) {
        // User is logged in, redirect to the requested page
        window.location.href = page;
    } else {
        // User is not logged in, show a premium confirmation dialog
        if (confirm("⚠️ Login is required to access this feature. Would you like to log in or sign up now?")) {
            // Extract the page name (e.g., 'booking.php' from the full URL)
            const redirectPage = page.split('/').pop();
            
            // Redirect to the login page and pass the intended destination
            window.location.href = "/northbound-travel-website/pages/loginsignup.php?redirect=" + redirectPage;
        }
    }
}