<!DOCTYPE html>
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
<?php 
    $GLOBALS['user'];
    $GLOBALS['userlist'] = array("alex@alex.com");
    $GLOBALS['notes'] = array("alex@alex.com" => array ("note1", "note2", "note3"));
?>