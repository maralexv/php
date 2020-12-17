<!DOCTYPE html>
<?php require 'header.php';?>

<?php
$dbhost = "localhost";
$dbuser = "alex";
$dbpass = "easter2000";
$db = "notes";

// Create connection to MariaDB server
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>

<div class="container-md">
    <div class="row" id="userout">
        <div class="col-sm">
            <h4>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Store user name in the session variable
                $_SESSION['user'] = test_input($_POST['user']);
                $user = $_SESSION['user'];
                }

                function test_input ($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                // Check if then user in db
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                $userflag = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($user == $row['UserName']) {
                        // Change flag to 1 if user found in the user db (returning user)
                        $userflag = 1; 
                        $_SESSION['user_id'] = $row['UserID'];
                    }
                }

                if ($userflag == 0) {
                    echo "how do you do <strong>" . $user . "</strong> ";
                    $sql = "INSERT INTO users (UserName) VALUES ('$user')";
                } else {
                    echo "welcome back <strong>" . $user . "</strong> :) ";
                }
                
                echo "(number of cookies: " . count($_COOKIE) . ")";
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
            <h4><strong>your notes:</strong></h4><br>
            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT NoteID, NoteText, Time 
                    FROM notes WHERE User_id='$user_id' 
                    ORDER BY NoteID
                    DESC";
            $result = $conn->query($sql);

            // loop through the notes array of the user 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p class='note'>" . $row['NoteText'] . "</p>";
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
