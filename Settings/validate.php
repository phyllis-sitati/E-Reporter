<?php
/**
* The functions in here perform a backend validation of user input 
*@author Phyllis Sitati
**/
 /**
 * Funtion that validates the password field of Admin Login
 **/
 function validatePassword($value)
 {
 	//Global variables used in the validation
 	global $password,$passwordColor,$passwordErrorMessage;
	global $newPassword,$newPasswordColor,$newPasswordErrorMessage;
	global $confirmPassword,$confirmPasswordColor,$confirmPasswordErrorMessage;
    //If the password field is not empty
 	if(isset($_POST[$value]) & !empty($_POST[$value]))
 	{
 		$password=$_POST[$value];
 		//Check the password length(8>p<16) then check if it follows the given regex pattern
 		if (strlen($password)>=8 & strlen($password)<16)
 		{
 			//pattern
 			$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
			if (preg_match($pattern,$password))
			{
				if ($value=="currentPassword" )
				{
					$passwordColor = "green";
				}
				elseif ($value=="newPassword") 
				{
					$newPasswordColor = "green";
				}
				elseif ($value=="confirmPassword")
				{
					$confirmPasswordColor = "green";
				}
				return true;
			}
			else
			{
				if ($value=="currentPassword" )
				{
					$passwordColor = "red";
					$passwordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				elseif ($value=="newPassword") 
				{
					$newPasswordColor = "red";
					$newPasswordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				elseif ($value=="confirmPassword")
				{
					$confirmPasswordColor = "red";
					$confirmPasswordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
				}
				return false;

			}

 		}
 		else
 		{
 			if ($name=="currentPassword" )
			{
				$passwordColor = "red";
				$passwordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			elseif ($name=="newPassword") 
			{
				$newPasswordColor = "red";
				$newPasswordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			elseif ($name=="confirmPassword")
			{
				$confirmPasswordColor = "red";
				$confirmPasswordErrorMessage = "*password length shoud be between 6 and 12 characters";
			}
			return false;
 		}

 	}
 	else
 	{
 		if ($name=="currentPassword" )
		{
			$passwordColor = "red";
			$passwordErrorMessage = "*password must be filled";
		}
		elseif ($name=="newPassword") 
		{
			$newPasswordColor = "red";
			$newPasswordErrorMessage = "*password must be filled";
		}
		elseif ($name=="confirmPassword")
		{
			$confirmPasswordColor = "red";
			$confirmPasswordErrorMessage = "*password must be filled";
		}
		return false;
 	}

 }

/**
*Validating the username
**/
function validateUsername($sname)
{
	global $username,$usernameColor,$usernameErrorMessage;
	if (isset($_POST[$sname]) & !empty($_POST[$sname]))
    {
    	$username = $_POST[$sname];

 		//checks if the username matches the pattern firstname.lastname 
  		$pattern = "/^[A-Za-z]+\.([A-Za-z]\.)?[A-Za-z]+$/";
  		if (preg_match($pattern,$username))
  	    {
  			$usernameColor= "green";
  			return true;
  		}
  		else
  		{
  			$usernameColor= "red";
  			$usernameErrorMessage= "invalid username";
  			return false;
  		}
		
	}
	else
	{
		$usernameColor= "red";
  		$usernameErrorMessage= "username must be filled";
  		return false;
	}
}

/**
* Function that validates admin email
**/
function validateEmail($mail)
{
	global $email,$emailColor,$emailErrorMessage;
	
	//checks if the email is set and not empty
	if (isset($_POST[$mail]) & !empty($_POST[$mail])) 
	{
		$email= $_POST[$mail];

		//checks if the email meets the pattern
		$pattern = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";

		if (preg_match($pattern,$email)) 
		{
			$emailColor = "green";
			return true;
		}
		else
		{
			$emailColor = "red";
			$emailErrorMessage = "*invalid email";
			return false;
		}
	}
	else
	{
		$emailColor = "red";
		$emailErrorMessage = "*email must be filled";
		return false;
	}
}
/**
*Function that validates phone number
**/
function validatePhone($phone_no)
{
	global $phone,$phoneColor,$phoneErrorMessage;

	//checks if the phone is set and not empty
	if (isset($_POST[$phone_no]) & !empty($_POST[$phone_no]))
	{
		$phone = $_POST[$phone_no];

		//checks if the phone meets the length requirement
		if (strlen($phone)>=4 & strlen($phone)<=13)
		{
			//checks if the phone meets the required pattern
			$pattern = "/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.\/0-9]*$/";

			if (preg_match($pattern,$phone))
			{
				$phoneColor = "green";
				return true;
			}
			else
			{
				$phoneColor = "red";
				$phoneErrorMessage = "*invalid phone number";
				return false;
			}
		}
		else
		{
			$phoneColor = "red";
			$phoneErrorMessage = "*phone number has to be between 4 and 13 digits";
			return false;
		}

	}
	else
	{
		$phoneColor = "red";
		$phoneErrorMessage = "*phone must be filled";
		return false;
	}
}

 /**
 * Function that validates firstname
 **/
 function validateName($fname)
{
	global $firstName,$firstNameColor,$firstNameErrorMessage;
	

	//checks +if the username meets the pattern
	$pattern = "/^[a-zA-Z]+$/";
	if (preg_match($pattern,$firstName)) 
	{
		$firstNameColor="green";
		return true;
	}
	else
	{
		$firstNameColor="red";
		$firstNameErrorMessage="*name must not contain numbers";
		return false;
	}
	
}
//Validate password
function validateP($pwd)
{
	//Global variables used in the validation
 	global $pword,$pwordColor,$pwordErrorMessage;

 	//Check the password length(8>p<16) then check if it follows the given regex pattern
	if (strlen($pword)>=8 & strlen($pword)<16)
	{
	 	//pattern
	 	$pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
		if (preg_match($pattern,$password))
		{
					
			$pwordColor = "green";
			return true;
		}
		else
		{
			$pwordColor = "red";
			$passwordErrorMessage = "*password must have atleast a number, symbol and an uppercase letter";
					
			return false;

		}

	}
	else
	{
		echo "Password must have atleast 8 characters and atmost 13";
	}

 }
 var_dump(validateName('Phyllis'));

?>