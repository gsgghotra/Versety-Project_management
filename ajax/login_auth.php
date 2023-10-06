<?php
// Include the database connection file
require_once "../database/connection.php";

// Get the values submitted via POST request
$loguser = $_POST['logname'];
$logpass = $_POST['logpass'];

if ($loguser != '' && $logpass != '') {
    // Check if both username and password are provided
    // Hash the password (assuming it's stored as MD5 in the database)
    $password = md5($logpass);
    $username = strtolower($loguser);

    // Perform a database query to retrieve user data by username
    $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$loguser'");
    $numrows = mysqli_num_rows($query);

    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            // Get the username and password from the database
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }

        if ($username == $dbusername && $password == $dbpassword) {
            // If username and password match, start a new session and set the username in the session
            session_start();
            $_SESSION['username'] = $loguser;
            echo 'success';
        }
    }
}
?>
