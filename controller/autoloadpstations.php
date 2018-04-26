<?php
/** Making an autocomplete feature for polling stations
* @author Phyllis Sitati
**/
//including necessary files
require_once('../database/dbconnect.php');
//$pollingstations = $_POST['pollst'];
	//databse object
    $edb=new DatabaseConnection;
    $conn= $edb->returnDBConnect();
    $theResult = array();
    //Query

     $sql1= "SELECT PName FROM pollingstation";
     if($conn)
     {
     	if(mysqli_query($conn, $sql1))
        {
            echo "";
        }
        else
        {
           echo "Error: ".mysqli_error($conn);
        }

    }
    $pResult=mysqli_query($conn, $sql1);
    if(mysqli_num_rows($pResult)>0)
    {
    	//$theResult=$row;
         while ($row = mysqli_fetch_assoc($pResult)) {
            
            # code...
              echo '<option value="'.$row['PName'].'">';
         }
              
    }
    else
    {
    	echo "no output:".mysql_error($conn);
    }

//var_dump(pAutocomplete());

?>