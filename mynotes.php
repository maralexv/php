<?php include 'header.php';?>

    <div class="container-md">
        <div class="row" id="userout">
            <div class="col-sm">
                <h4>
                    <?php 
                    // Store user name in the cookie
                    $_COOKIE[$cookie_value] = $_POST['user']; 
                    
                    // Check if then user in db
                    // if ()) {
                    //     echo "welcome back <strong>" . $_COOKIE[$cookie_value] . "</strong> :)";
                    // } else {
                    //     // If not, add user to the user db
                    //      = $_COOKIE[$cookie_value];
                    //     echo "how do you do <strong>" . $_COOKIE[$cookie_value] . "</strong>";
                    // }
                    echo "how do you do <strong>" . $_COOKIE[$cookie_value] . "</strong>";
                    ?>
                </h4>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm">
                <form class="form-inline" id="newnote" method="POST" action="">
                    <input type="text" class="form-control" name="newnote" placeholder="new note"/>
                    <input type="submit" class="btn btn-outline-dark" value="add">
                </form>
            </div>
        </div>
        <br>

        <?php
        // Grab value from the newnote and add it to the notes db for the logged user
        ?>

        <div class="row" id="notes">
            <div class="col-sm">
                <h4><strong>your notes:</strong></h4>
                <?php
                // loop through the notes array of the user 
                
                ?>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
