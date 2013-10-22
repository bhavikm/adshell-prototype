<?php

class Fuelcard_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function getFuelCard($fuelCardID)
	{
		$query = "SELECT fuelcards.*,count(fuelcardproducts.fuelCardID) productsCount 
				  FROM fuelcards,fuelcardproducts
				  WHERE fuelcards.fuelCardID = fuelcardproducts.fuelCardID 
				  AND fuelcards.fuelCardID = :fuelCardID
				  GROUP BY fuelcardproducts.fuelCardID
				  ORDER BY fuelcards.cardStatus";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':fuelCardID',$fuelCardID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
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
			
			return $fuelcard;
		} else {
			return false;
		}
	}
	
	public function getFuelCardProducts($fuelCardID)
	{
		$query = "SELECT fuelcardproducts.*, producttype.productKey
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
			$products = array();
			foreach ($results as $result)
			{
				$products[] = $result['productKey'];
			}
			return $products;
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
	
	public function resetCardPin($fuelCardID)
	{
		$query = "UPDATE fuelcards SET pin = NULL WHERE fuelCardID = :fuelCardID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':fuelCardID',$fuelCardID);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function updateCardStatus($fuelCardID, $status, $employeeID)
	{
		$query = "UPDATE fuelcards SET cardStatus = :status, employeeReviewID = :employeeID, statusChangeDate = CURDATE() WHERE fuelCardID = :fuelCardID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':status',$status);
		$statement->bindValue(':employeeID',$employeeID);
		$statement->bindValue(':fuelCardID',$fuelCardID);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function updateAllFuelCardStatuses($applicationID, $status, $employeeID)
	{
		$query = "UPDATE fuelcards SET cardStatus = :status, employeeReviewID = :employeeID, statusChangeDate = CURDATE() WHERE applicationID = :applicationID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':status',$status);
		$statement->bindValue(':employeeID',$employeeID);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function updateFuelCardProducts($fuelCardProducts,$fuelCardID)
	{
		$query = "DELETE FROM fuelcardproducts WHERE fuelCardID = :fuelCardID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':fuelCardID',$fuelCardID);
		$statement->execute();
		$statement->closeCursor();
		
		$productIDs = array();
		foreach ($fuelCardProducts as $product)
		{
			$productIDs[] = $this->getProductTypeIDByKey($product);
		}
		
		$this->addFuelcardProducts($fuelCardID,$productIDs);
	
	}
	
	public function getProductTypeIDByKey($productKey)
	{
		$query = "SELECT productTypeID FROM producttype WHERE productKey = :productKey";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':productKey',$productKey);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result['productTypeID'];
		} else {
			return false;
		}
	}
	
	public function addFuelcardProducts($fuelcardID,$productIDs)
	{
		foreach ($productIDs as $productID)
		{
			$query = "INSERT INTO fuelcardproducts
					  (fuelCardID,productTypeID)
					  VALUES (:fuelCardID,:productTypeID)";
				
			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':fuelCardID',$fuelcardID);
			$statement->bindValue(':productTypeID',$productID);
			$statement->execute();
			$statement->closeCursor();
		}
	}
	
	public function addFuelCard($applicationID,$name,$registration,$pinRequired,$status)
	{
		$query = "INSERT INTO fuelcards
				  (applicationID,accountID,cardHolderName,cardStatus,dateCreated,registrationNo,pinRequired,pin)
				  VALUES (:applicationID,NULL,:name,:status,CURDATE(),:registration,:pinRequired,NULL)";
				
		//cardStatus can take values 'enabled','disabled','cancelled'
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':name',$name);
		$statement->bindValue(':registration',$registration);
		if ($pinRequired == 'yes')
		{
			$statement->bindValue(':pinRequired',TRUE);
		} else {
			$statement->bindValue(':pinRequired',FALSE);
		}
		$statement->bindValue(':status',$status);
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('fuelcards');	
	}
	
	public function addFuelCardRequest($applicationID,$name,$registration,$pinRequired,$status)
	{
		$query = "INSERT INTO fuelcards_change
				  (applicationID,accountID,cardHolderName,cardStatus,dateCreated,registrationNo,pinRequired,pin,approval)
				  VALUES (:applicationID,NULL,:name,:status,CURDATE(),:registration,:pinRequired,NULL,'pending')";
				
		//cardStatus can take values 'enabled','disabled','cancelled'
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':name',$name);
		$statement->bindValue(':registration',$registration);
		if ($pinRequired == 'yes')
		{
			$statement->bindValue(':pinRequired',TRUE);
		} else {
			$statement->bindValue(':pinRequired',FALSE);
		}
		$statement->bindValue(':status',$status);
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('fuelcards_change');	
	}
	
	public function addFuelcardChangeProducts($fuelcardID,$productIDs)
	{
		foreach ($productIDs as $productID)
		{
			$query = "INSERT INTO fuelcardproducts_change
					  (fuelCardID,productTypeID,status,changeType,changeDate)
					  VALUES (:fuelCardID,:productTypeID,'pending','insert',NOW())";
				
			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':fuelCardID',$fuelcardID);
			$statement->bindValue(':productTypeID',$productID);
			$statement->execute();
			$statement->closeCursor();
		}
	}
}
?>