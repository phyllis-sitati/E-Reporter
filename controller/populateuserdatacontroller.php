<?php
//populating user information
//variables
global $user_name, $pass_word, $first_name, $middle_name, $last_name, $email_add, $phone_number, $physical_address;
//check if user is logged in
if(isset($_SESSION['Admin_Id']))
{
	$user_name=$_SESSION['Username'];
	$pass_word=$_SESSION['pwd'];
    $first_name=$_SESSION['u_first'];
    $middle_name=$_SESSION['u_middle'];
    $last_name=$_SESSION['u_last'];
    $email_add=$_SESSION['u_email'];
    $phone_number=$_SESSION['phone'];
    $physical_address =$_SESSION['u_address'];         
}
?>