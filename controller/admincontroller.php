<?php
/**
*This is a controller for the administrator activities
**/
//Including necessary files
 require_once('../settings/validate.php');
 require_once('../classes/adminfunctions.php');
 //Creating an object for the administrator class
 $adUser= new AdminUser;

 //Function DisplayRegistered voters
 function displayRegistered()
 {
 	$voters=$adUser->registeredVoters();
 	echo '<div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
 }
 //Function that creates a new admin
function createAdmin()
{
	//Variable
	$uname=$pwd=$fname=$mname=$sname=$mail=$phone_no='';

	//Get data from user
	if(isset($_POST['adminReg']))
	{
		if(isset($_POST['firstname']) & isset($_POST['middlename'])&isset($_POST['lastname']) & isset($_POST['usname']) & isset($_POST['email']) & isset($_POST['password']) & isset($_POST['mobile_number']))
		{
			$uname=$_POST['usname'];
			$pwd=$_POST['password'];
			$fname=$_POST['firstname'];
			$mname=$_POST['middlename'];
			$sname=$_POST['lastname'];
			$mail=$_POST['email'];
			$phone_no=$_POST['mobile_number'];

			/*Validate the user values*/
			if($validateName($fname) & $validateName($mname) & $validateName($sname) & validatePhone($phone_no) & validateEmail($mail) & validateUsername($uname) & validateP($pwd))
			{
				//Insert the details
				$adUser->createAdmin($fname, $mname, $sname,$uname, $pwd,$phone_no,$mail)

			}

		}
	}


}
?>