<?php
/**
*This class authenticates Admin Login 
*@author Phyllis Sitati
**/
//including the database file
require_once("../database/dbconnect.php");
//Creating a database connection
$dbObj = new DatabaseConnection;
//Initializing login variables: username and password
//$username = '';
//$password = '';

if (/*$_SERVER['REQUEST_METHOD'] == 'POST' &*/ isset($_POST["logbtn"])) 
{
    
    if(isset($_POST["username"]) & isset($_POST["passwd"])) 
    {
        $username = $_POST["username"];
        $password = $_POST["passwd"];
       // echo $username;
        // Query that gets admin details to enable login

        $query = "SELECT * FROM adminuser WHERE Username ='$username'";
       //checking a database connection
        if($dbObj->returnDBConnect()==true)
        {
          $conn=$dbObj->queryDatabase($query);
          //var_dump($conn);
            if($dbObj->queryDatabase($query)==true)
            {
              $adminDetails = $dbObj->getRow();
             // echo $adminDetails;

               //check the values of the returned $adminDetails
              if($adminDetails==null)
              {
                echo "Wrong username";
              }
              else
              {
                //echo $adminDetails['Password'];
                //otherwise verify the password and redirect user to admin dashboard
                if(password_verify($password,$adminDetails['Password']))
                {

                    //Start a session
                    session_start();
                    $_SESSION['Admin_Id']= $adminDetails['Admin_Id'];
                    $_SESSION['Username']= $adminDetails['Username'];
                    $_SESSION['pwd']= $adminDetails['Password'];

                    header("Location: ../Admin/dashboard.php");
                }
                else
                {
                    header("Location: AdminLogin.php");
                }
              }
            }
            else
            {
                echo "Could not execute query ".mysqli_error($conn);
            }
//Cotilah@1996
        }
    }
}
?>