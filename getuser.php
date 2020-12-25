<?php
// Get parameter form the URL
$q = test_input($_REQUEST["q"]);

// echo "It works! > ". $q . "!";

if ($q !== "") {

    // Connect to the database
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

    // Check if then user in db
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $userflag = 0;
    $user_id = 0;
    while ($row = $result->fetch_assoc()) {
        if ($q == $row['UserName']) {
            // Change flag to 1 if user found in the user db (returning user)
            $userflag = 1; 
            $user_id = $row['UserID'];
        } 
    }

    if ($userflag == 0) {
        $data = array("how do you do ", $q);
        echo json_encode($data);

        $sql = "INSERT INTO users (UserName) VALUES ('$q')";

        if ($conn->query($sql) === TRUE) {
            echo "<br>
            <small>(new user " . $q . " regestered successfully)</small>";
          } else {
            echo "Error: " . $sql . " " . $conn->error;
          }

    } else {
        $data = array("welcome back ", $q, $user_id);
        echo json_encode($data);
    }

    $result->free_result();
    $conn->close();
}

function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>