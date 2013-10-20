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
				  GROUP BY fuelcardproducts.fuelCardID
				  ORDER BY fuelcards.cardStatus";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		
		if (count($results) > 0 )
		{
			$fuelcards = array();
			foreach ($results as $result)
			{
				$fuelcard = array();
				$fuelcard['fuelCardID'] = $result['fuelCardID'];
				$fuelcard['applicationID'] = $result['applicationID'];
				$fuelcard['holderName'] = $result['cardHolderName'];
				$fuelcard['cardStatus'] = $result['cardStatus'];
				if ($result['pinRequired'] == '1')
				{
					$fuelcard['pinRequired'] = true;
					$fuelcard['pin'] =  $result['pin'];
				} else {
					$fuelcard['pinRequired'] = false;
					$fuelcard['pin'] = false;
				}
				$fuelcard['registrationNo'] = $result['registrationNo'];
				
				//get fuel card products
				$fuelcard['fuelCardProducts'] = $this->getFuelCardProducts($result['fuelCardID']);
				
				$fuelcards[] = $fuelcard;
			}
			return $fuelcards;
		} else {
			return false;
		}
	}
	
	public function getFuelCardProducts($fuelCardID)
	{
		$query = "SELECT fuelcardproducts.*, producttype.productName
				  FROM fuelcardproducts, producttype
				  WHERE fuelcardproducts.fuelCardID = :fuelCardID
				  AND fuelcardproducts.productTypeID = producttype.productTypeID";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':fuelCardID',$fuelCardID);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		
		
		if (count($results) > 0)
		{
			return $results;
		} else {
			return false;
		}
	
	}
	
	public function getCustomerForAccount($username)
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
		 
		$applicationID = $this->getApplicationIDForCustomer($accountID);
		
		$customerDetails = $this->getCustomerInformation($applicationID);
		
		return $customerDetails;
	}
	
	public function getApplicationIDForCustomer($accountID)
	{
		$query = "SELECT * FROM customer WHERE accountID = :accountID";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':accountID',$accountID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0)
		{
			return $result['applicationID'];
		} else {
			return false;
		}
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