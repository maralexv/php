<?php include 'header.php';?>

    <div class="container-md">
        <div class="row" id="userout">
            <div class="col-sm">
                <h4>
                    <?php 
                        // Check whether this user is in the user list
                        $GLOBALS['user'] = $_POST['user']; 
                        if (in_array($GLOBALS['user'], $GLOBALS['userlist'])) {
                            echo "welcome back <strong>" . $GLOBALS['user'] . "</strong> :)";
                        } else {
                            // If not, add hi,/her to the user list
                            $GLOBALS['userlist'][] = $GLOBALS['user'];
                            echo "how do you do <strong>" . $GLOBALS['user'] . "</strong>";
                        }
                    ?>
                </h4>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm">
                <form class="form-inline" id="newnote" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" class="form-control" name="newnote" placeholder="new note"/>
                    <input type="submit" class="btn btn-outline-dark" value="add">
                </form>
            </div>
        </div>
        <br>

        <?php
            // Grab value from the newnote and add it to the notes array for the logged user
        ?>

        <div class="row" id="notes">
            <div class="col-sm">
                <h4><strong>your notes:</strong></h4>
                <?php
                    // loop through the notes array of the user 
                    foreach ($GLOBALS['notes'] as $user => $notearray) {
                        if ($user == $GLOBALS['user']) {
                            // echo each note in <p></p>
                            foreach ($notearray as $note) {
                                echo "<p>" . $note . "</p>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
