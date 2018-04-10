<?php
/**
* This class gets information that the user posts
**/
// the database class
require_once('../database/dbConnect.php');
//Object of the Database class
$edb=new DatabaseConnection;
Class PublicUser{
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
    function getStation($PollingStation)
    {
        $StationCode='';
        if($edb->getConnection()==true)
        {
           //Getting polling station code
            $stationqry="SELECT 'PCode'FROM 'pollingstation' WHERE PName='$PollingStation';";
            if($edb->queryDatabase($stationqry)== true)
            {
              if($edb->getResult())
              {
                 $row=$edb->getRow();
                 $StationCode=$row['PCode'];

             }

         }   
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
    if($edb->getConnection()==true)
    {
        $qry="SELECT 'Candidate_Id' FROM 'candidate' WHERE 'FirstName'='$fname' AND 'Surname'='$surname' AND 'Party'='$party' ;";
        if($edb->queryDatabase($qry)== true)
        {
          if($edb->getResult())
              {
                 $row=$edb->getRow();
                 $id=$row['Candidate_Id'];

             }
             else
             {
                echo "empty result";
             }  
        }
        else{
            echo "problems with query";
        } 
    }
    return $id;
 }

 /**
 * Function that returns a candidate's category
 * @return candidate's category.
 **/
 function candidateCategory($fname,$surname,$party)
 {
    $category='';
    if($edb->getConnection()==true)
    {
        $qry="SELECT 'Category' FROM 'candidate' WHERE 'FirstName'='$fname' AND 'Surname'='$surname' AND 'Party'='$party' ;";
        if($edb->queryDatabase($qry)== true)
        {
          if($edb->getResult())
              {
                 $row=$edb->getRow();
                 $category=$row['Category'];

             }
             else
             {
                echo "empty result";
             }  
        }
        else{
            echo "problems with query";
        } 
    }
    return $category;
 }
/**------------------
   END OF HELPER FUNCTIONS
*----------------------
**/

/**
* Function that inserts the user's personal details
**/
 function userDetails($PollingStation,$Fname, $Mname,$Surname,$Phone)
 {
    if($edb->getConnection()==true)
    {
            //Getting polling station code using polling station name

        $StationCode=$this->getStation($PollingStation);
        if(!Empty($StationCode))
        {

             //Query for Inserting
            $userqry ="INSERT INTO 'publicuser'('PCode','FirstName','Surname','PhoneNumber') VALUES( '$StationCode','$Fname', '$Mname','$Surname','$Phone');";
               //Inserting public user data
            if($edb->queryDatabase($userqry)== true)
            {
               echo "Successfully inserted public user";
            }

       }

   }
   else{
    echo "Could not insert public user data";
   }

}

    /**Function that inserts a polling station result statistics**/
   
function pollStatistics($PollingStation,$TotalCast, $ValidVotes, $Rejected, $Voter_Turnout, $Percentage)
{
    if($edb->getConnection()==true){
       //Getting polling station code from Name
       $stationCode=$this->getStation($PollingStation);
       if(!Empty($stationCode))
       {
           $qry="INSERT INTO 'results_statitics'('PCode','TotalVotesCast','ValidVotes','Rejected','Voter_Turnout','Percentage') VALUES('$stationCode','$TotalCast', '$ValidVotes', '$Rejected', '$Voter_Turnout', '$Percentage');";
           if($edb->queryDatabase($userqry)== true)
           {
             echo "Statistics Inserted succefully";
           }
           else
           {
            echo " Could not insert statistics";
           }
        }
        else
        {
            echo "Empty polling station code";
        } 
    }
    else
    {
        echo "Check database connection";
    }
    
    

}

/**
* Function that inserts candidate data supplies by the public user
**/
function insertCandidateData($fname,$surname,$party, $userid, $pollingstation, $result,$percentage)
{
    if($edb->getConnection()==true)
    {
        //Get polling station code
        $stationCode=$this->;
        //Get candidate ID
        $candidateId=$this->;
        //Get candidate category
        $category=$this->;
    }
}

}
?>