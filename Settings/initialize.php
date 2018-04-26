<?php
//CHECKS IF USERS ARE LOGGED INTO THE SYSTEM USING A SESSION VARIABLE
global $message;
session_start();
if(isset($_SESSION['Admin_Id']))
{
	//Get user 
	$user =$_SESSION['u_first'];
	$message=" Welcome ".$user;
 	//echo " Welcome ".$user."<br>";
}
else
{
	//Redirect to login
	header("Location:../Login/AdminLogin.php");

}
?>