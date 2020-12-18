<!DOCTYPE html>
<?php require 'header.php';?>

<div>
    <h5>let me know who you are (provide your email please):</h5>
    <form method="POST" action="mynotes.php">
        <input type="email" name="user" placeholder="e-mail: you@domain.net">
        <input type="submit" value="submit">
    </form>
</div>

<?php include 'footer.php';?>
