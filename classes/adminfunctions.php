<?php
/**
* Class that performs all the functions of the admin
*@author Phyllis Sitati
**/
// the database class
require_once('../database/dbConnect.php');
//Object of the Database class
$edb=new DatabaseConnection;
//PublicUser class
require_once('publicUserPost.php');
//Object of the PublicUser class
$pUser= new PublicUser;

Class AdminUser{
	//Constructor
	function _construct(){}

	/**Function that displays total registered voters
	*@return integer
	**/
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
    }

	/**
	* Function that creates a new administrator
	**/
	function createAdmin($fname, $mname, $lname,$username, $email,$password,$phone,$physicalAdd)
	{
		$qry="INSERT INTO 'adminuser'('FirstName', 'MiddleName', 'Surname', 'username', 'Password','PhoneNumber', 'Email_address','Physical_Address')VALUES('$fname', '$mname', '$lname','$username', '$password','$phone','$email','$physicalAdd');";
		if($edb->getConnection()==true)
		{
			if($edb->queryDatabase($qry))
			{
				echo "Succesfully created an admin";
			}
			else
			{
				echo "query unsuccesful";
			}
		}
		else
		{
			echo "problem connecting to the database";
		}

	}
	/**
	* Function that allow the admin to approve results
	**/
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

	}

	/**
	* Function that displays approved results
	**/
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

    }

	/**
	* Function that shows cancelled results
	*@return Uname, Cname, pollname,Result,insert_Time,Picture
	**/
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
	/**
	* Function that locks a polling station
	**/

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
       if($PName==$StationName and $status=='approved'){
       	echo "The submission slot for this polling station is closed";
       }
	}

}
?> 