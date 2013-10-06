<?php

class Search_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function searchInformationPages($searchQuery)
	{
		//$searchQuery = '% '.$searchQuery.' %';
		//$query = "SELECT * FROM information WHERE pageName LIKE concat('%{',:query1,'}%') OR content LIKE concat('% ',:query2,' %')";
		$query = "SELECT * FROM information WHERE MATCH (pageName,content) AGAINST (:query1)";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':query1',$searchQuery);
		//$statement->bindValue(':query2',$searchQuery);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		
		if (count($results) > 0 )
		{
			return $results;
		} else {
			return false;
		}
	
	}
	
}