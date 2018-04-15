<?php
/**
*This is a controller for the administrator activities
**/
//Including necessary files
 require_once('../settings/validate.php');
 require_once('../classes/adminfunctions.php');

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
function createAdmn()
{
	 
	//Variable
	//$uname=$pwd=$fname=$mname=$sname=$mail=$phone_no=$physicalAdd='';

	//Get data from user
	if($_SERVER["REQUEST_METHOD"]=="POST" & isset($_POST['adminReg']))
	{
		//Creating an object for the administrator class
        $adUser= new AdminUser;
		if(isset($_POST['firstname']) & isset($_POST['middlename'])&isset($_POST['lastname']) & isset($_POST['usname']) & isset($_POST['email']) & isset($_POST['password']) & isset($_POST['mobile_number']) & isset($_POST['paddress']))
		{
			$uname=$_POST['usname'];
			$pwd=$_POST['password'];
			$fname=$_POST['firstname'];
			$mname=$_POST['middlename'];
			$sname=$_POST['lastname'];
			$mail=$_POST['email'];
			$phone_no=$_POST['mobile_number'];
			$physicalAdd=$_POST['paddress'];
			//echo $physicalAdd;

			/*Validate the user values*/
			/*if(validateName($fname)==true & validateName($mname)==true & validateName($sname)==true & validatePhone($phone_no)==true & validateEmail($mail)==true & validateUsername($uname)==true & validateP($pwd)==true)
			{*/
				
				//Hash password and insert the details
				$pwd_hashed= password_hash($pwd, PASSWORD_DEFAULT);
				
				$adUser->createAdmin($fname, $mname, $sname,$uname, $pwd_hashed,$phone_no,$mail, $physicalAdd);

			/*}*/

		}
		else
		{
           echo "Fill all the fields";
		}
	}

}
 //Function that updates user profile details

 function updateDetails()
 {
 	//
 	if (isset($_POST['updatebtn']))
 	{
 		//Check if the fields have data
 		if(isset($_POST['mail']) & isset($_POST['fname']) & isset($_POST['mname']) & isset($_POST['lname']) & isset($_POST['password']) & isset($_POST['phone']) & isset($_POST['address']))
 		{
 			//Get data from the fields
 			$fname = $_POST['fname'];
 			$mname = $_POST['mname'];
 			$sname = $_POST['lname'];
 			$pwd = $_POST['password'];
 			$phone_no = $_POST['phone'];
 			$mail = $_POST['mail'];
 			$address = $_POST['address'];

 			//Update user details
 			//Creating an object for the administrator class
            $adUser= new AdminUser;
 			$adUser->updateUserProfile($fname, $mname, $sname, $mail, $pwd, $phone_no, $address);
 		}
 		else
 		{
 			echo "you have empty field(s)!";
 		}
 	}
 }

 //function that populates the fields of the user profile before an update occurs
 function populateProfile($id){}
 
if(isset($_POST['adminReg']))
{
	createAdmn();
}
if(isset($_POST['updatebtn']))
{
	updateDetails();
}

//var_dump(createAdmn());
?>