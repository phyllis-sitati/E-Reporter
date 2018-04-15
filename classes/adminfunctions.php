<?php
/**
* Class that performs all the functions of the admin
*@author Phyllis Sitati
**/
// the database class
require_once('../database/dbConnect.php');
//PublicUser class
//require_once('publicUserPost.php');
//Object of the PublicUser class
//$pUser= new PublicUser;

Class AdminUser
{
	
	//Constructor
	function _construct(){}

	/**Function that displays total registered voters
	*@return integer
	
    function registeredVoters()
    {
    	$sum=0;
    	//Query
    	$qry="SELECT NumRegistered FROM 'pollingstation';";
    	//check database connection
    	if($edb->getConnection()==true)
    	{
    		if($edb->queryDatabase($qry))
    		{
    			$output= $edb->getResult();
    			foreach ($output as $key => $value) {
    				$sum= $sum+$key;
    			}

    		}
       	}
       	return $sum;
    }**/

	/**
	* Function that creates a new administrator
	**/
	function createAdmin($fname, $mname, $lname,$username, $password, $phone, $email, $physicalAdd)
	{
		//Object of the Database class
       $edb= new DatabaseConnection;
		$qry="INSERT INTO adminuser(FirstName, MiddleName, Surname, Username, Password,PhoneNumber, Email_Address,Physical_Address)VALUES('$fname', '$mname', '$lname','$username', '$password','$phone','$email','$physicalAdd')";
		$conn=$edb->returnDBConnect();
		if($conn)
		{
			if(mysqli_query($conn,$qry))
			{
				header("location: ../Admin/dashboard.php");
			}
			else
			{
				header("location: ../Admin/CreateAdmin.php");
			}
		}
		else
		{
			header("location: ../Admin/CreateAdmin.php");
		}

	}

	/**
    *Function that updates user profile
    **/

    function updateUserProfile($fname, $mname, $lname, $emailAdd,$passd, $pno, $paddr)
    {
    	//Object of the Database class
       $edb= new DatabaseConnection;
    	$id =0;
    	//Hash password
    	$pwd_hashed = password_hash($passd, PASSWORD_DEFAULT);
    	//Query that gets the id of an admin
    	$qry1 ="SELECT Admin_Id FROM adminuser WHERE PhoneNumber='$pno'";
       if($edb->returnDBConnect()==true)
       	{
       		$conn=$edb->queryDatabase($qry1);
       		//Get Admin id
       		if($edb->queryDatabase($qry1)==true)
       		{
              $row=$edb->getRow();
              $id=$row['Admin_Id'];
              echo $id;
              //Update the user details
       		  //Query that gets updates user details
    	      $qry2="UPDATE adminuser SET FirstName='$fname', MiddleName='$mname', Surname='$lname', Password='$pwd_hashed',PhoneNumber='$pno', Email_Address='$emailAdd', Physical_Address='$paddr' WHERE Admin_Id=$id ";
    	      if($edb->queryDatabase($qry2)==true)
    	      {
    	    	 echo "User details updated";
    	      }
       		}
       		else
       		{
       			echo "could not execute query".mysqli_error($conn);
       		}
       		
       	} 
    }
}



$adminuser= new AdminUser;

//$adminuser->updateUserProfile('Phyllis', 'Khisa','Sitati', 'phyllis.sitati@ashesi.edu.gh', '0540184989',  'Cotilah@1996','3nd Wamalwa Kijana Street Bungoma');
	/**
	* Function that allow the admin to approve results
	
	function approveResults($userid)
	{
		$uid=$cid=$pcode=$picture=$Result=$Percentage=$status=$insert_Time=$location;
		//Get time of posting result
		$qry1="SELECT * FROM 'result_unofficial' WHERE userid=$userid ;" ;
		if($edb->getConnection()==true)
		{
			if($edb->queryDatabase($qry1))
			{
				//get result and assign to the variables and check if any is null,check if the location match the pcode, ///////check if the time of insertion is more than 24hrs then update the status accordingly
			}
		}

	}**/

	/**
	* Function that displays approved results
	
    function displayApproved()
    {
    	$userid=$cid=$Result;
		$Percentage;
		$insert_Time;
		$Picture;
		$pcode=$Uname=$Cname=$pollname;
    	//Query
    	$qry= "SELECT * FROM 'result_unofficial' WHERE 'status'='approved';";
    	$qry2="SELECT 'FirstName','MiddleName','Surname' FROM publicuser WHERE userid=$userid ;";
		$qry3="SELECT 'FirstName','MiddleName','Surname'  FROM candidate WHERE Candidate_Id=$cid ;";
		$qry4="SELECT 'PName' FROM pollingstation WHERE 'PCode'='$pcode';";

    }**/

	/**
	* Function that shows cancelled results
	*@return Uname, Cname, pollname,Result,insert_Time,Picture
	
	function cancelledResults()
	{
		$userid=$cid=$Result;
		$Percentage;
		$insert_Time;
		$Picture;
		$pcode=$Uname=$Cname=$pollname;
		$qry1="SELECT * FROM 'results_unofficial' WHERE 'status'='cancelled';";
		$qry2="SELECT 'FirstName','MiddleName','Surname' FROM publicuser WHERE userid=$userid ;";
		$qry3="SELECT 'FirstName','MiddleName','Surname'  FROM candidate WHERE Candidate_Id=$cid ;";
		$qry4="SELECT 'PName' FROM pollingstation WHERE 'PCode'='$pcode';";

		//connecting to database and executing queries
		if($edb->getConnection()==true)
		{
			if($edb->queryDatabase($qry1))
			{
				$userid=$row['User_Id'];
				$cid=$row['Candidate_Id'];
				$pcode=$row['PCode'];
				$Result=$row['Result'];
				$Percentage=$row['Percentage'];
				$insert_Time=$row['insert_Time'];
		        $Picture = $row['Picture'];

				if($edb->queryDatabase($qry2))
				{
					$Uname=$row2['FirstName'] + $row2['MiddleName'] + $row2['Surname'];
				}
				if($edb->queryDatabase($qry3))
				{
					$Cname=$row3['FirstName'] + $row3['MiddleName'] + $row3['Surname'];
				}
				if($edb->queryDatabase($qry4))
				{
					$pollname=$row3['PName'];
				}
				

			}
		}
		return ($Uname, $Cname, $pollname,$Result,$insert_Time,$Picture);//Checkout

	}
	**/

	/**
	* Function that locks a polling station
	

	function lockStation($pcode,$StationName)
	{
		$status=$PName;
        $qry1="SELECT 'status' FROM 'result_unofficial' WHERE PCode=$pcode ;";
        $qry2="SELECT 'PName' FROM 'pollingstation' WHERE PCode=$pcode ;";
        //connecting to database and executing queries
	   if($edb->getConnection()==true)
	   {
	   	  //Getting the status
	   	  if($edb->queryDatabase($qry1))
	   	  {
	   	  	$status=$row1['status'];
	 	  }
	 	  //Getting the polling station name
	 	  if($edb->queryDatabase($qry2))
	   	  {
	   	  	$PName=$row2['PName'];
	 	  }
	   }
       //Checking condition for locking
       if($PName==$StationName and $status=='approved')
       {
       	echo "The submission slot for this polling station is closed";
       }
	}**/

?> 