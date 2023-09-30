<?php
require_once 'database/init.php';
session_unset();
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
?>
