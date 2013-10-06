<?php

class Employee_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function getEmployeeForAccount($username)
	{
		$query = "SELECT * FROM account WHERE userName = :username";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			$accountID = $result['accountID'];
		} else {
			return false;
		}
		
		$query = "SELECT * FROM employee WHERE accountID = :accountID";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':accountID',$accountID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateEmployeeDetails()
	{
	
	}
	
}
?>