<?php
//Including necessary files
require_once('../database/dbconnect.php');
require_once('../classes/publicUserPost.php');
// Function that posts the election results by a public user
function postPublicResult()
{
	//variable
	//Personal data variables
	$fname; $mname; $lname; $location; $pNumber;
	//Election variables
	$pStation; $valid; $rejected; $totalCast; $pinkPic; $presFigures; $presWords; $parFigures; $parWords;


	if(isset($_POST['postresult']))
	{
		//Get database connection
		$edb=new DatabaseConnection;
		$conn=$edb->returnDBConnect();

      //Get information from user
	  $fname= mysqli_real_escape_string($conn, $_POST['nameOne']);
	  $mname=mysqli_real_escape_string($conn, $_POST['nameTwo']);
	  $lname=mysqli_real_escape_string($conn, $_POST['surname']);
	  $location=mysqli_real_escape_string($conn, $_POST['location']);
	  $pNumber=mysqli_real_escape_string($conn, $_POST['PUphone']);

	  $pStation=mysqli_real_escape_string($conn, $_POST['pstation']);
	  $valid=mysqli_real_escape_string($conn, $_POST['tvalid']);
	  $rejected=mysqli_real_escape_string($conn, $_POST['trejected']);
	  $totalCast=mysqli_real_escape_string($conn, $_POST['tcast']);
	  //$pinkPic=$_POST['pinksheet'];

	  /*$presFigures= $_POST['fVotes'];
	  $presWords= $_POST['wVotes'];
	  $parFigures= $_POST['fVotes2'];
	  $parWords= $_POST['wVotes2'];*/

	  //Get picture and properties
      $pinkPic=$_FILES['pinksheet']['tmp_name'];

	  //Check if any of the fields are empty
	  if(empty($fname) || empty($mname) || empty($lname) || empty($location) || empty($pNumber) || empty($pStation)|| empty($valid)|| empty($rejected)|| empty($totalCast)|| !isset($pinkPic))
	  {
	  	$errormsg= "Fill all the fields";
	  	echo "error! fill all empty fields!";
        exit();
	  }
	  else
	  {
	  	//Check if the attached picture is in picture format 
	  	$picContents=addslashes(file_get_contents($_FILES['pinksheet']['tmp_name'])) ;
	  	$picName=addslashes($_FILES['pinksheet']['name']);
	  	$img_size = getimagesize($_FILES['pinksheet']['tmp_name']);
	  	if($img_size==false)
	  	{
	  		$img_errmsg ="This is not an image";
	  		echo "This is not an image";
            exit();
	  	}
	  	else
	  	{
	  		//object of the publicUserPost class
	  		$PUpost= new PublicUser;
	  		//Post the page data
	  		//Get pollingstation code from name of pollingstation
	  		$pStationCode = $PUpost->getStationCode($pStation);
	  		//post user details.
	  		if ($pStationCode)
	  		 {
	  			# code...
	  			#Post details of the public user
	  			$PUpost->userDetails($fname, $mname,$lname,$location, $pStationCode,  $pNumber);
	  		}
	  		else
	  		{
	  			echo "could not get polling station code";
	  		}
	  		//Post statistics of a polling station (i.e total votes cast, rejected votes etc
	  		$PUpost->pollStatistics($fname, $lname,$pStation, $totalCast, $valid, $rejected, $totalCast,$picContents);
	  		
           //Post candidate results
	  		#get user id of the posting public user
	  		$puser_id=$PUpost->PUserId($fname, $lname);
	  		$inFigures = $_POST['figures'];
	  		$inWords = $_POST['words'];
	  		$ids= $_POST['id'];
	  		if($puser_id)
	  		{   
	  			$idCount = count($_POST['id']);
	  			for ($i=0; $i < $idCount; $i++) { 
		  			//array that holds candidate first name,last name,and party
		  			#get candidate category
		  			#get candidate id
		  			#id array
		  			#figures array
		  			#words arrary
		  	

		  			$PUpost->insertCandidateData($puser_id, $ids[$i], $pStation, $inFigures[$i],$inWords[$i]);
	  			}

	  		}//DATA
	  		#Joseph Sitati Barasa NZEMA MAANLE PREP SCH BLK A HALF-ASSIN, 0560197845, 600, 45,

	  		
	  	}
	  	
	  }

	  //var_dump($presFigures);
	  //echo $fname;
	}
}
if(isset($_POST['postresult']))
{
	postPublicResult();
}
?>