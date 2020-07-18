<?php
//This file is connect you to the logout button wherever it exists, this will end the user connection with the data and the session.
// We have already seen in admin_main_page.php about the session login, this file will help you to logout from that session. 
session_start();

session_unset();
session_destroy();

header("location: home.php");
exit;
?>