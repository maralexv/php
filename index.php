<?php
// Initiate the session
session_start();

// Set cookie if not set yet
$cookiename = "usr";
$cookievalue;
if(!isset($_COOKIE[$cookiename])) {
    setcookie($cookiename, $cookievalue,  time()+(60*60*24*30), "/var/www/"); // 60*60*24*30 = 30 days
    // echo "(number of cookies: " . count($_COOKIE) . ")";
}

// if(isset($_COOKIE[$cookiename])) {
//     echo "cookie " . $_COOKIE[$cookiename] . "is set";
//     require 'mynotes.php';
// } else {
//     echo "cookie is not set " . count($_COOKIE) . " ";
//     require 'login.php';
// }

if (!$_SESSION['user']) {
    require 'login.php';
} else {
    require 'mynotes.php';
}
?>
