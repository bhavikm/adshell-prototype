<?php

class Login_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function add_user($username,$password) {
		
		$password = sha1($password);
		$query = "INSERT INTO account (userName,password) VALUES (:username,:password)";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->bindValue(':password',$password);
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('account');
	}
	
	public function is_valid_login($username,$password) {
		
		$password = sha1($password);
		$query = "SELECT accountID FROM account WHERE userName = :username AND password = :password";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->bindValue(':password',$password);
		$statement->execute();
		
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;
	}
	
	public function is_valid_login_employee($username,$password) {
		
		$password = sha1($password);
		$query = "SELECT accountID FROM account 
				  WHERE userName = :username 
				  AND password = :password
				  AND accountID IN (SELECT accountID FROM employee)";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->bindValue(':password',$password);
		$statement->execute();
		
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;
	}
	
	public function is_valid_login_customer($username,$password) {
		
		$password = sha1($password);
		$query = "SELECT accountID FROM account 
				  WHERE userName = :username 
				  AND password = :password
				  AND accountID NOT IN (SELECT accountID FROM employee)";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->bindValue(':password',$password);
		$statement->execute();
		
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;
	}
	
	public function update_login_password($username,$new_password)
	{
		$password = sha1($new_password);
		$query = "UPDATE account SET password = :password WHERE userName = :username";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->bindValue(':password',$password);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function valid_user($username)
	{
		$query = "SELECT accountID FROM account 
				  WHERE userName = :username";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':username',$username);
		$statement->execute();
		
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;
	}

}