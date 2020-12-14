<?php include 'header.php';?>

<body>

    <div class="container-md">
        <div class="row" id="userin">
            <div class="col-sm">
                <form class="form-inline" method="POST" action="">
                    <input type="email" class="form-control" id="user" name="user" placeholder="Email: you@example.com">
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
        <br>

        <div class="row" id="userout">
           
        </div>

        <div class="row">
            <div class="col-sm">
                <form class="form-inline" method="POST" action="">
                    <input type="text" class="form-control" id="newnote" name="newnote" placeholder="New note"/>
                    <input type="submit" name="submit">
                </form>
            </div>
        </div>
        <br>

        <div class="row" id="notes">
            <div class="col-sm">
                <p>notes go here</p>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
