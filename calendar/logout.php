<?php
require_once 'aps/init.php';
session_unset();
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0; URL=../index.php\">";
?>