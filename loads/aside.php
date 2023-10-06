<?php 
// Check if the user is logged in
if (logged_in() === true) {
    // User is logged in; you can place content or actions here for logged-in users
} else {
    // User is not logged in; include the "login.php" file to display the login form
    include 'login.php';
}
?>