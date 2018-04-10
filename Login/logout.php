<?php
/**
* This is a logout page for the admin
*@author Phyllis Sitati
**/
//start session
session_start();

//destroy session
session_destroy();


//redirect to the Admin Login Page
header("Location: ../AdminLogin.php");

?>
?>