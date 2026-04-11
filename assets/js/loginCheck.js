
function checkLogin(page) {
    const isLoggedIn = (typeof window.userIsLoggedIn !== 'undefined') ? window.userIsLoggedIn : false;

    if (isLoggedIn) {
        // Agar logged in hai, toh seedha us page par bhejo
        window.location.href = page;
    } else {  
    Swal.fire({
        title: 'Login Required',
        text: 'Is feature ke liye login zaroori hai!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Login Now',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#ffb400',
        cancelButtonColor: '#6c757d',
        background: '#1e1e2f',
        color: '#fff'
    }).then((result) => {
        if (result.isConfirmed) {
            const pageName = page.substring(page.lastIndexOf('/') + 1);
            window.location.href = "/northbound-travel-website/pages/loginsignup.php?redirect=" + pageName;
        }
    });
 }
}

