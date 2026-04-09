function checkLogin(page) {
    const isLoggedIn = (typeof window.userIsLoggedIn !== 'undefined') ? window.userIsLoggedIn : false;

    if (isLoggedIn) {
        // Agar logged in hai, toh seedha us page par bhejo
        window.location.href = page;
    } else {
        // Agar nahi hai, toh login page par bhejo aur wapas aane ka rasta (redirect) batao
        if (confirm("⚠️ Is feature ke liye login zaroori hai. Kya aap login karna chahte hain?")) {
            // Hum sirf file ka naam nikaal rahe hain (e.g., contact.php)
            const pageName = page.substring(page.lastIndexOf('/') + 1);
            window.location.href = "/northbound-travel-website/pages/loginsignup.php?redirect=" + pageName;
        }
    }
}