<?php

session_start();

// ✅ Unset all session variables
$_SESSION = [];

// ✅ Destroy session
session_destroy();

// ✅ Prevent back access (cache control)
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// ✅ Redirect to login
header("Location: login.php");
exit();

?>