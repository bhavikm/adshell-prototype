<?php

class Customer_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function getCustomerFuelCards($applicationID)
	{
		$query = "SELECT fuelcards.*,count(fuelcardproducts.fuelCardID) productsCount 
				  FROM fuelcards,fuelcardproducts
				  WHERE fuelcards.fuelCardID = fuelcardproducts.fuelCardID 
				  AND fuelcards.applicationID = :applicationID
				  GROUP BY fuelcardproducts.fuelCardID";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
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
	
	public function getApplicationIDForCustomer()
	{
	
	}
	
	public function getNumberFuelCardsForCustomer($applicationID)
	{
		$query = "SELECT count(*) cardsCount 
				  FROM fuelcards
				  WHERE applicationID = :applicationID";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		
		if (count($result) > 0 )
		{
			return $result['cardsCount'];
		} else {
			return false;
		}
	}
	
	public function getBriefCustomerInformation()
	{
		$query = "SELECT customer.*,application.*,businessdetails.*,count(fuelcards.fuelCardID) cardsCount 
				  FROM customer,application,businessdetails,fuelcards
				  WHERE customer.applicationID = application.applicationID 
				  AND application.applicationID = businessdetails.applicationID 
				  AND fuelcards.applicationID = application.applicationID
				  ORDER BY accountCreated DESC LIMIT 10";

		$statement = $this->database->db->prepare($query);
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
	
	public function getCustomerInformation($applicationID)
	{
		$query = "SELECT customer.*,application.*,businessdetails.*,count(fuelcards.fuelCardID) cardsCount 
				  FROM customer,application,businessdetails,fuelcards
				  WHERE customer.applicationID = :applicationID
				  AND customer.applicationID = application.applicationID 
				  AND application.applicationID = businessdetails.applicationID 
				  AND fuelcards.applicationID = application.applicationID
				  ORDER BY accountCreated DESC LIMIT 10";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
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
	
}
?>