<?php
// Start the PHP session
session_start();

// Check if 'username' is set in the session; if not, set it to an empty string
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Include the database connection file
require_once "connection.php";

// SQL command to select user data based on the session username
$sqlCommand = "SELECT * FROM users WHERE username='$username'";
$query = mysqli_query($connection, $sqlCommand) or die(mysqli_error());

// Loop through the query result to fetch user data (if exists)
while ($row = mysqli_fetch_array($query)) {
    $username = $row["username"];
}

// Function to calculate and format the time passed since a given timestamp
function time_passed($timestamp) {
    // ... (your time_passed function code)
}

// Free the query result
mysqli_free_result($query);

// Function to check if a user is logged in
function logged_in() {
    return (isset($_SESSION['username'])) ? true : false;
}

// Function to redirect to the home page if the user is already logged in
function logged_in_redirect() {
    if (logged_in() === true) {
        echo "<meta http-equiv=\"refresh\" content=\"0; URL=calendar/home.php\">";
        exit();
    }
}

// Function to protect a page by redirecting to the index page if the user is not logged in
function protect_page() {
    if (logged_in() === false) {
        echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
        exit();
    }
}

// Function to output errors as an unordered list
function output_errors($errors) {
    return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
?>
