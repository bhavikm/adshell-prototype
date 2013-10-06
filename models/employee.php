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
	
	public function getEmpIDFromAccountName($accountName)
	{
		$query = "SELECT employeeID FROM employee, account WHERE employee.accountID = account.accountID AND account.userName = :accountName";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':accountName',$accountName);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result['employeeID'];
		} else {
			return false;
		}
	}
	
	public function updateEmployeeDetails($jobDescription, $empName, $empPhone, $empAddress, $employeeID)
	{
		$query = "UPDATE employee SET jobDescription = :jobDescription, empName = :empName, empPhone = :empPhone, empAddress = :empAddress WHERE employeeID = :employeeID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':jobDescription',$jobDescription);
		$statement->bindValue(':empName',$empName);
		$statement->bindValue(':empPhone',$empPhone);
		$statement->bindValue(':empAddress',$empAddress);
		$statement->bindValue(':employeeID',$employeeID);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function searchEmployees($empFirstName,$empLastName)
	{
		if (strlen($empLastName) != 0)
		{
			$query = "SELECT * FROM employee WHERE empName LIKE concat(:empFirstName,'%') OR empName LIKE concat('%',:empLastName)";
			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':empFirstName',$empFirstName);
			$statement->bindValue(':empLastName',$empLastName);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
		} else {
			$query = "SELECT * FROM employee WHERE empName LIKE concat('%',:empFirstName,'%')";
			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':empFirstName',$empFirstName);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
		}
		
		
		
		if (count($results) > 0 )
		{
			return $results;
		} else {
			return false;
		}
	
	}
	
}
?>