<?php include 'header.php';?>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    require 'mynotes.php';
} else {
    require 'main.php';
}
?>

<?php include 'footer.php';?>
