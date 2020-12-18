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

<div id="userout">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Store user name in the session variable
            if (!$_SESSION['user']) {
                $_SESSION['user'] = test_input($_POST['user']);
                $user = $_SESSION['user'];
            }
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

            if ($conn->query($sql) === TRUE) {
                echo "<br>new user regestered successfully.";
              } else {
                echo "Error: " . $sql . " " . $conn->error;
              }

        } else {
            echo "welcome back <strong>" . $user . "</strong> :) ";
        }
                
        // echo "(number of cookies: " . count($_COOKIE) . ")";
        ?>
</div>

<div>
    <form method="POST" action="">
        <textarea id="newnote" type="text" name="newnote" rows="3" cols="50">
        </textarea>
        <input id="submit" type="submit" value="add">
    </form>
</div>
<br>

<?php
// Grab value from the newnote and add it to the notes db for the logged user

?>

<div><p>your notes:</p></div>
<div id="notes">
    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT NoteID, NoteText, Time 
            FROM notes WHERE User_id='$user_id' 
            ORDER BY NoteID
            DESC";
    $result = $conn->query($sql);

    // loop through the notes array of the user 
    if ($result->num_rows > 0) {
        $id = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<p class='note' id='$id'>" . $row['NoteText'] . "</p>";
            $id = $id + 1;
        }
    }
    ?>
</div>

<?php include 'footer.php';?>
