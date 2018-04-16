<?php
/**
*This is a controller for the administrator activities
**/
//Including necessary files
 require_once('../settings/validate.php');
 require_once('../classes/adminfunctions.php');
 require_once('../database/dbconnect.php');

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
	 

	//Get data from user
	if(isset($_POST['adminReg']))
	{
		//Creating an object for the administrator class
        $adUser= new AdminUser;
        //Creating an object of the database class
        $db= new DatabaseConnection;
        //Get a connection
        $conn=$db->returnDBConnect();
        //Get user data
            $uname=mysqli_real_escape_string($conn, $_POST['usname']);
            $fname=mysqli_real_escape_string($conn, $_POST['firstname']);
            $mname=mysqli_real_escape_string($conn, $_POST['middlename']);
            $sname=mysqli_real_escape_string($conn, $_POST['lastname']);
            $mail=mysqli_real_escape_string($conn, $_POST['email']);
            $phone_no=mysqli_real_escape_string($conn, $_POST['mobile_number']);
			$pwd=mysqli_real_escape_string($conn, $_POST['password']);
			$physicalAdd=mysqli_real_escape_string($conn, $_POST['paddress']);

			 //Check for empty fields
		if(empty($uname)|| empty($fname) || empty($mname) || empty($sname) || empty($mail) || empty($phone_no)|| empty($pwd)|| empty($physicalAdd))
		{
			header("Location: ../Admin/CreateAdmin.php?CreateAdmin= you have empty fields");
			exit();
		}
		else
		{
			//Validate the user values using a regex patterns
			//check for username
			if(!preg_match("/^[A-Za-z]+\.([A-Za-z]\.)?[A-Za-z]+$/", $uname))       
			{
				header("Location: ../Admin/CreateAdmin.php?CreateAdmin= invalid! username must be in the format firstname.lastname");
			    exit();
			}
			else
			{
				//Check for first, middle and last name
				if(!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $mname) 
					|| !preg_match("/^[a-zA-Z]+$/", $sname) )
				{
					header("Location: ../Admin/CreateAdmin.php?CreateAdmin= Invalid! name must contain letters only");
			        exit();
				}
				else
				{
					//Check for email pattern and validity
					if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $mail) 
						& !filter_var($mail, FILTER_VALIDATE_EMAIL))
					{
						header("Location: ../Admin/CreateAdmin.php?CreateAdmin= Please enter a valid email!");
			            exit();
					}
					else
					{
						//validate phone number
						if(!preg_match("/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.\/0-9]*$/", $phone_no ))
						{
							header("Location: ../Admin/CreateAdmin.php?CreateAdmin= Invalid Phone number!");
			                exit();
						}
						else
						{
							//Validate password
							if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/", $pwd))
							{
								header("Location: ../Admin/CreateAdmin.php?CreateAdmin= Password must be atleast 6 characters, contain atleast 1 uppercase value, lowercase value, number and a symbol!");
			                    exit();
							}
							else
							{
								//Check if the username already exists
								//Query
								$sql = "SELECT * FROM adminuser WHERE Username='$uname'";
								//Execute query
								$output=mysqli_query($conn,$sql);
								$outputcheck= mysqli_num_rows($output);
								if($outputcheck > 0)
								{
									header("Location: ../Admin/CreateAdmin.php?CreateAdmin= username is already taken");
							        exit();
								}
								else
								{
										//Hash the password 
										$pwd_hashed= password_hash($pwd, PASSWORD_DEFAULT);
										// insert user details using function from adminuser class
										$adUser->createAdmin($fname, $mname, $sname,$uname, $pwd_hashed,$phone_no,$mail, $physicalAdd);
								}
							}
						}
					}
				}

			}

		}		

	 }
	}

 //Function that updates user profile details

 function updateDetails()
 {
 	//
 	if (isset($_POST['updatebtn']))
 	{
 		//Get a database connection
 		$db= new DatabaseConnection;
        $conn=$db->returnDBConnect();
 		//Check if the fields have data
 		if(isset($_POST['mail'])  & isset($_POST['fname']) & isset($_POST['mname']) & isset($_POST['lname']) & isset($_POST['password']) & isset($_POST['phone']) & isset($_POST['address']))
 		{
 			//Get data from the fields
 			$fname =mysqli_real_escape_string($conn, $_POST['fname']);
 			$mname = mysqli_real_escape_string($conn, $_POST['mname']);
 			$sname = mysqli_real_escape_string($conn, $_POST['lname']);
 			$pwd = mysqli_real_escape_string($conn, $_POST['password']);
 			$phone_no =mysqli_real_escape_string($conn, $_POST['phone']);
 			$mail = mysqli_real_escape_string($conn, $_POST['mail']);
 			$address = mysqli_real_escape_string($conn, $_POST['address']);
 			$usernm=mysqli_real_escape_string($conn, $_POST['myname']);

 			//Update user details
 			//Creating an object for the administrator class
            $adUser= new AdminUser;
 			$adUser->updateUserProfile($fname, $mname, $sname,$usernm, $mail, $pwd, $phone_no, $address);
 		}
 		else
 		{
 			echo "you have empty field(s)!";
 		}
 	}
 }
 
if(isset($_POST['adminReg']))
{
	createAdmn();
}
if(isset($_POST['updatebtn']))
{
	updateDetails();
}
//Cotilah@1996 0540184587  phyllis.sitati@ashesi.edu.gh  Phyllis.Sitati, Sitati  Nabangi Phyllis, 2nd Wamalwa Kijana street

//var_dump(createAdmn());
?>