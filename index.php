<?php include 'header.php';?>

    <div class="container-md">
        <div class="row">
            <div class="col-sm">
                    <h5>let me know who you are (provide your email please):</h5>
                    <form class="form-inline" method="POST" action="mynotes.php">
                        <input type="email" class="form-control" name="user" placeholder="Email: you@example.com">
                        <input type="submit" class="btn btn-outline-primary" value="submit">
                    </form>
            </div>
        </div>
        <?php if (!$GLOBALS['user']) {
            echo "<h1> the user is " . $GLOBALS['user'] . "</h1>";
            };
        ?>
    </div>

<?php include 'footer.php';?>
