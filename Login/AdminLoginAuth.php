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

if (isset($_POST["logbtn"])) 
{
  //get and checking a database connection
   $conn= $dbObj->returnDBConnect();
   //Get user details
   $username =mysqli_escape_string($conn, $_POST['username']);
   $psword =mysqli_escape_string($conn, $_POST['passwd']);
    
    if(empty($username)|| empty($psword)) 
    {
      header("Location:AdminLogin.php?login=error! empty fields!");
        exit();
    }
    else
    {
      //Check if username exists in the database
      $sql="SELECT * FROM adminuser WHERE Username='$username'";
      $usExist = mysqli_query($conn, $sql);
      $check=mysqli_num_rows($usExist);
      if($check < 1)
      {
        header("Location:AdminLogin.php?login=error!");
        exit();
      }
      else
      {
        // verify the password and redirect user to admin dashboard
        if($row = mysqli_fetch_assoc($usExist))
        {
          $dbpass=$row['Password'];
          //otherwise verify the password and redirect user to admin dashboard
          $verified=password_verify($psword, $dbpass);
          //check if they did not matched and send user back to login
          if($verified==false)
          {
            header("Location: AdminLogin.php?login=wrong password!");
            exit();
          }
          elseif ($verified==true)
          {
            # login user
            //Start a session
            session_start();
            $_SESSION['Admin_Id']= $row['Admin_Id'];
            $_SESSION['Username']= $row['Username'];
            $_SESSION['pwd']= $row['Password'];
            $_SESSION['u_first']= $row['FirstName'];
            $_SESSION['u_middle']= $row['MiddleName'];
            $_SESSION['u_last']= $row['Surname'];
            $_SESSION['phone']= $row['PhoneNumber'];
            $_SESSION['u_email']= $row['Email_Address'];
            $_SESSION['u_address']= $row['Physical_Address'];

            header("Location: ../Admin/dashboard.php?login=success!");
            exit();

          }
        }
      }
    }
  }
 /* else Cotilah@1996
  {
    header("Location:AdminLogin.php?login=error! you don't have permission to access this page");
    exit();
  }*/
   
?>