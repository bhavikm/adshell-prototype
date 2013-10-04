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

}