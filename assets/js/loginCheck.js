function checkLogin(page){

    const isLoggedIn = "<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>";

    if(isLoggedIn === "yes"){
        window.location.href = page;
    } else {
        if(confirm("⚠️ Login required to continue")){
            window.location.href = "/northbound-travel-website/pages/loginsignup.php?redirect=" + page.split('/').pop();
        }
    }
}
