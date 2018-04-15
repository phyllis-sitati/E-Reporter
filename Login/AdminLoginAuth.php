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
   $password =mysqli_escape_string($conn, $_POST['passwd']);
    
    if(empty($username)|| empty($password)) 
    {
      
    }
    else
    {
      //Check if username exists in the database
      $sql1="SELECT * FROM adminuser WHERE Username='$username'";
      $usExist =mysql_query($sql1);
    }
  }else
  {
    header("Location:AdminLogin.php?login=error! you don't have permission to access this page");
    exit();
  }
        // Query that gets admin details to enable login

        $query = "SELECT * FROM adminuser WHERE Username ='$username'";
       //get and checking a database connection
        $conn= $dbObj->returnDBConnect();
        //echo $conn;
        if(mysqli_query($conn, $query))
        {
          echo " ";
        }
        else
        {
          echo "error: ".mysql_error($connection);
        }
          //Query database to get user details
          $result=mysqli_query($conn, $query);

           if($result)
           {
              $adminDetails = mysqli_fetch_assoc($result);

              //check the values of the returned $adminDetails
              if($adminDetails==null)
              {
                echo "Wrong username";
              }

              else
              {
                //echo $adminDetails['Password'];
                //otherwise verify the password and redirect user to admin dashboard
                $verified=password_verify($password, $adminDetails['Password']);
                //var_dump($verified);
                if($verified)
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
                  echo "wrong password";
                    //header("Location: AdminLogin.php");
                }
              }

            }  
            else
            {
                echo "no result returned ".mysqli_error($conn);
            }
        }
        else
        {
          echo "fill in your username and password";
        }
      }
            
//Cotilah@1996
   
?>