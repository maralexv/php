<?php include 'header.php';?>

<body>
    <div class="container-md">
        <div class="row" id="userout">
            <div class="col-sm">
                <h4><?php echo $_POST['user'];?></h4>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm">
                <form class="form-inline" id="newnote" method="POST" action="">
                    <input type="text" class="form-control" name="newnote" placeholder="New note"/>
                    <input type="submit" class="btn btn-outline-dark" value="add">
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
