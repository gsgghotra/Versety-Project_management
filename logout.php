<?php
// Include the initialization file (database/init.php)
require_once 'database/init.php';

// Unset and destroy the user's session
session_unset();  // Unset all session variables
session_destroy(); // Destroy the session data

// Redirect the user to the "index.php" page after 0 seconds
echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
?>
