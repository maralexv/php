<?php
// Start the session
session_start();

// Set cookie if not set yet
$cookiename = "usr";
$cookievalue;
if(!isset($_COOKIE[$cookiename])) {
    setcookie($cookiename, $cookievalue,  time()+(60*60*24*30), "/var/www/"); // 60*60*24*30 = 30 days
}
?>