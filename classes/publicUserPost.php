<?php
/**
* This class gets information that the public user posts
* It has various functions that aid public user posting operations.
*@author Phyllis Sitati
**/
// the database class
require_once('../database/dbConnect.php');

Class PublicUser 
{
   

  //Constructor
  function _construct(){}

/**--------------------------------
   START OF HELPER FUNCTIONS
*----------------------------------
**/

    /**Function that gets the a polling station's code
    * Given pollingstaion name
    * @return a code for the polling station 
    **/
  function getStationCode($PollingStation)
  {
        $StationCode='';
        //Object of the Database class
        $erdb=new DatabaseConnection;
        $connection=$erdb->returnDBConnect();
        //Checking connection
        if($connection)
        {
           // query for Getting polling station code
            $stationqry="SELECT PCode FROM pollingstation WHERE PName='$PollingStation'";
            if(mysqli_query($connection,$stationqry))
            {
              echo " ";
            } 
            else
            {
              echo "error:". mysqli_error($connection);
            }
            //Get the code
            $Pcode=mysqli_query($connection,$stationqry);
            if(mysqli_num_rows($Pcode)> 0)
            {
                 $row=mysqli_fetch_assoc($Pcode);
                 $StationCode=$row['PCode'];

            }
            else
            {
              echo "no rows were returned";
            }
        }
        else
        {
          echo "connection error". mysqli_error($connection);
        }
     return $StationCode;
  }

 /**
 * Function that returns a candidate's id
 * @return a candidate id
 **/

 function candidateId($fname, $surname, $party)
 {
    $id=0;
    //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();

    if($connection)
    {
        $qry="SELECT Candidate_Id FROM candidate WHERE FirstName='$fname' AND Surname='$surname' AND Party='$party' ;";
        if(mysqli_query($connection,$qry))
        {
          echo " "; 
        }
        else
        {
            echo "problems with query".mysqli_error($connection);
        } 
        //Get the query result
        $id_result=mysqli_query($connection,$qry);
        if(mysqli_num_rows($id_result)>0)
        {
           $row=mysqli_fetch_assoc($id_result);
           $id=$row['Candidate_Id'];

        }
        else
       {
          echo "empty result";
       } 
    }
    else
    {
      echo "connection error".mysqli_error($connection);
    }
    return $id;
 }

 /**
 * Function that returns a public user id
 * @return public user's id.
 **/
 function PUserId($fname,$surname)
 {
    $pUserId=0;
    //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();

    if( $connection)
    {
        $qry="SELECT User_Id FROM publicuser WHERE FirstName='$fname' AND Surname='$surname' ";
        if(mysqli_query($connection,$qry))
        {
          echo " "; 
        }
        else
        {
            echo "problems with query".mysqli_error($connection);
        } 
        //Get the query result
        $pid_result=mysqli_query($connection,$qry);
        if(mysqli_num_rows($pid_result)>0)
        {
           $row=mysqli_fetch_assoc($pid_result);
           $pUserId=$row['User_Id'];

        }
        else
       {
          echo "empty result";
       } 
    }
    else
    {
      echo "connection error".mysqli_error($connection);
    }
    return $pUserId;
 }

 /**
 * Function that gets a candidate's category
 **/
 function candidateCategory($cand_Id)
 {
   $category='';
   //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();
    if ($connection)
    {
      # code...
      #query that gets a candidate's category
      $qry="SELECT Category FROM candidate WHERE Candidate_Id=$cand_Id";
      if (mysqli_query($connection,$qry))
      {
        # code...
        echo " ";
      }
      else
      {
        echo "error executing query:".mysqli_error($connection);
      }
      $output=mysqli_query($connection,$qry);
      if(mysqli_num_rows($output)> 0)
      {
        $rows=mysqli_fetch_assoc($output);
        $category=$rows['Category'];
      }
      return $category;
    }

 }

/**------------------
   END OF HELPER FUNCTIONS
*----------------------
**/


/**
* Function that inserts the public user's personal details
**/
 function userDetails($Fname, $Mname,$Surname,$location, $pStationCode, $Phone)
 {
    //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();
    //Check database connection
    if($connection)
    {
            //Insert public user's details

             //Query for Inserting
            $userqry ="INSERT INTO publicuser (FirstName,MiddleName, Surname, CurrentLocation, PCode, PhoneNumber) VALUES( '$Fname', '$Mname','$Surname','$location', '$pStationCode', '$Phone')";
               //Inserting public user data
            if(mysqli_query($connection,$userqry))
            {
              $insertUsermsg= "Successfully inserted public user";
               echo "Successfully inserted public user";
            }
            else
            {
              echo "could not execute query".mysqli_error($connection);
            }
       
   }
   else{
    echo "Could not insert public user data";
   }

}

 /**Function that inserts a polling station result statistics
 *i.e. totalvotescast, rejected, valid votes etc
 **/
   
function pollStatistics($pfname, $psurname,$PollingStation, $TotalCast, $ValidVotes, $Rejected, $Voter_Turnout,$pic)
{
    //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();
    if($connection)
    {
       //Getting polling station code from Name
       $stationCode=$this->getStationCode($PollingStation);
       ////Getting public user id  from first and last Name
       $puserId=$this->PUserId($pfname,$psurname);
       if(!Empty($stationCode) & $puserId > 0 )
       {
           $qry="INSERT INTO result_statistics(User_Id, PCode, TotalVotesCast, validVotes, RejectedVotes, Voter_Turnout, PinkSheetPicture) VALUES($puserId, '$stationCode',$TotalCast, $ValidVotes, $Rejected, $Voter_Turnout, '$pic')";
           if(mysqli_query($connection, $qry))
           {
            echo "polling station statistics inserted successfully";
           }
           else
           {
            echo "error"/*. mysql_error($connection)*/;
           }
           
       }
       else
       {
        echo "empty pollingstation id or public user id";
       }
    }
    else
    {
        echo "Check database connection";
    } 
}

/**
* Function that inserts candidate data supplies by the public user
*these are individual results for each candidates.
**/

function insertCandidateData($userid, $cand_Id, $pollingstation, $r_figures,$r_words)
{
    //Object of the Database class
    $erdb=new DatabaseConnection;
    $connection=$erdb->returnDBConnect();
    //Check database connection and carry outoperations
    if($connection)
    {
        //Get polling station code
        $stationCode=$this->getStationCode($pollingstation);
        //$pDate=SELECT NOW();
        //Query that inserts the result
        $cand_result =" INSERT INTO result_unofficial(User_Id, Candidate_Id, PCode,  Result_Figures, Result_Words, Result_Status) VALUES('$userid', '$cand_Id', '$stationCode', '$r_figures', '$r_words', 'UNAPPROVED')";
        if(mysqli_query($connection,$cand_result))
        {
          echo "successfully inserted candidate result";
        }
        else
        {
          echo "error with query: ".mysqli_error($connection);
        }
    }
    else
    {
      echo "check your connection";
    }
}

}
$pUser = new PublicUser;
//$pUser->userDetails('Melissah', 'Sabina', 'Sitati', 'Ojomoro_North Primary school', 'A010101','0567335589');
//var_dump($pUser->getStationCode('PEACE INTERNATIONAL PRIM SCH COMBODIA HALF-ASSINI'));
//var_dump($pUser->pUserId('Melissah','Sitati'));
//var_dump($pUser->pollStatistics('Melissah', 'Sitati','METH JSS BLK A HALF-ASSINI', 600, 555, 45, 600, ));
//var_dump($pUser->insertCandidateData(1, 3, 'METH JSS BLK A HALF-ASSINI', 67,'Sixty seven'));
//var_dump($pUser->candidateCategory(3));

?>