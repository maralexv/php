<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<?php
$cookie_name = "thisuser";
$cookie_value;
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 seconds = 1 day
setcookie($cookie_name, $cookie_value, time() + (60 * 2), "/"); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>

    <!-- BOOTSTRAP CSS CODE GOES HERE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        body {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        input {
            margin-right: 8px;
        }
    </style>

</head>

<body>
