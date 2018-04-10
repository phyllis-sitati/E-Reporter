<?php
/**
*This class authenticates Admin Login 
*@author Phyllis Sitati
**/
//Initializing login variables: username and password
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once("../database/dbconnect.php");
    //Creating a database connection
    $dbObj = new DatabaseConnection;
   if(isset($_POST["submit"]))  { 
    if(!empty($_POST["username"]) && !empty($_POST["passwd"])) {
        $username = $_POST["username"];
        $password = $_POST["passwd"];
       //Getting a database connection

        $connection = $dbObj->returnDBConnect(); 
        //Get the password from the database
        $query = $connection->prepare("SELECT Password FROM adminlogin WHERE Username = ? ");
        $query->bind_param("s", $username);
        $query->execute();
        $query->bind_result($dbPassword);
        $query->fetch();
        $query->close();
        var_dump($dbPassword);
        /**Get admin id using the username, password from database and password from the form**/
        //First verify the two passwords

        if(password_verify($password,$dbPassword)){
        	$newPasswd = $dbPassword;
        }
         
    
        $query = $connection->prepare("SELECT Admin_Id FROM adminlogin WHERE Username = ? and Password = ? ");
        $query->bind_param("ss", $username, $newPasswd );
        $query->execute();
        $query->bind_result($adminId);
        $query->fetch();
        $query->close();
        
        if(!empty($adminId)) {
            session_start();
            $session_key = session_id();
            
            $query = $connection->prepare("INSERT INTO sessions ( Admin_Id, session_key, session_address, session_adminagent, session_expires) VALUES ( ?, ?, ?, ?, DATE_ADD(NOW(),INTERVAL 1 HOUR) )");
            $query->bind_param("isss", $adminId, $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'] );
            $query->execute();
            $query->close();
            
            header('Location: Admin/AdminDashBoard.php');
        }
        else {
            header('Location: Login/AdminLogin.php');
        }
        
    } else {
        header('Location: Login/AdminLogin.php');
    }
} 
}
?>