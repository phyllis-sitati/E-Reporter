<?php
/**
 * This class connects the database to the application 
 * and creates functions for other database operations.
 *
 *@author Phyllis Sitati
**/	
//including a file with database variables
require_once("dbcredential.php");

//Creating the database class
class DatabaseConnection
{
	//properties
	private $connection;
	private $result;

	//methods

	/**
	*The function that creates a connection connection method
	* @return returns true or false
	**/
	private function getConnection()
	{
		$this ->connection = mysqli_connect(SERVER,USER,PASS,DATABASE);

		if ($this ->connection)
		{
			return true;
		}
		return false;
	}
	/**
	* A method returns a connection of the database
	*@return returns database connection
	**/
	function returnDBConnect(){
		if($this->getConnection()==true){
			return $this ->connection;
		}
		else{
			echo ("Could not return connection");
		}
	}

	/**
	* A method for querying the database
	*@param $sqlQuery
	*@return returns true or false
	**/
	function queryDatabase($sqlQuery)
	{
		//Checking database connection
		//prints a statement alerting the user if the connection is not established
		if(!$this->getConnection())
		{
			echo("Could not connect to database");
		}

		//run query  returns false if query fails
		$this->result = mysqli_query($this->connection,$sqlQuery);

		//closes the mysql connection
		mysqli_close($this->connection);
		
		//checks if the query fails
		if ($this->result == false) 
		{
			return false;
		}
		return true;
	}


	//function that returns the result of the query
	function getResult()
	{
		return $this ->result;
	}

	/*
	*gets a row from the result
	*@return returns false or a row
	*/
	function getRow()
	{
		//checks if the result is false
		if ($this->result == false) 
		{
			return false;
		}

		//returns a row from the result or null if the result is null
		return mysqli_fetch_assoc($this->result);
	}

	/*
	*gets the number of rows from the result
	*@return returns false or the number of rows
	*/
	function getNumRows()
	{
		//checks if the result is false
		if ($this->result == false) 
		{
			return false;
		}

		//returns the number of rows from the result
		return mysqli_num_rows($this->result);
	}

}
/**$pswhashed= password_hash('Barasa7730',PASSWORD_DEFAULT);
echo $pswhashed;*/
?>