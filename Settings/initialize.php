<?php
//CHECKS IF USERS ARE LOGGED INTO THE SYSTEM USING A SESSION VARIABLE
session_start();
if(isset($_SESSION['Admin_Id']))
{
	//Get user 
	$user =$_SESSION['Username'];
 	echo " Welcome ".$user."<br>";
}
else
{
	//Redirect to login
	header("Location:../Login/AdminLogin.php");

}
?>