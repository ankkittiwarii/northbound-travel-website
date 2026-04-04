<?php
session_start();

$_SESSION = [];
session_destroy();

header("Location: /northbound-travel-website/index.php");
exit();
?>