<?php include 'header.php';?>

<body>
    <div class="container-md">
        <div class="row" id="userin">
            <div class="col-sm">
                <h4>Please login:</h4>
                <form class="form-inline" id="user" method="POST" action="mynotes.php">
                    <input type="email" class="form-control" name="user" placeholder="Email: you@example.com">
                    <input type="submit" class="btn btn-outline-primary" value="login">
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
