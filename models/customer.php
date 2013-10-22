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
				  GROUP BY application.applicationID
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
		$query = "SELECT customer.*,application.*,businessdetails.*,businesstype.businessType, count(fuelcards.fuelCardID) cardsCount 
				  FROM customer,application,businessdetails,fuelcards,businesstype
				  WHERE customer.applicationID = :applicationID
				  AND customer.applicationID = application.applicationID 
				  AND application.applicationID = businessdetails.applicationID 
				  AND fuelcards.applicationID = application.applicationID
				  AND businessdetails.businessTypeID = businesstype.businessTypeID
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
	
	public function updateCustomerStatus($status, $applicationID)
	{
		$query = "UPDATE customer SET customerStatus = :status WHERE applicationID = :applicationID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':status',$status);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$statement->closeCursor(); 
		
	}
	
	public function updateCustomerCredit($limit, $applicationID)
	{
		$query = "UPDATE application SET creditLimit = :limit WHERE applicationID = :applicationID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':limit',$limit);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$statement->closeCursor(); 
	
	}
	
	public function addCustomerComment($comment, $customerID, $employeeID)
	{
		
		$query = "INSERT INTO customercomment (customerID,employeeID,datetime,comment) VALUES (:customerID,:employeeID,now(),:comment)";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':customerID',$customerID);
		$statement->bindValue(':employeeID',$employeeID);
		$statement->bindValue(':comment',$comment);
		$statement->execute();
		$statement->closeCursor(); 
	
	}
	
	public function getCustomerComments($customerID)
	{
		$query = "SELECT *  
				  FROM customercomment
				  WHERE customerID = :customerID
				  ORDER BY datetime DESC
				  LIMIT 10";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':customerID',$customerID);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		
		
		if (count($result) > 0 )
		{
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateCustomerDetails($contactFirstName,$contactLastName,$email,$phone,$position,$mobile,$fax,$applicationID)
	{
		$query = "UPDATE application 
				  SET contactFirstName = :contactFirstName, 
				  contactLastName = :contactLastName, 
				  email = :email,
				  phone = :phone,
				  position = :position,
				  fax = :fax,
				  mobile = :mobile
				  WHERE applicationID = :applicationID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':contactFirstName',$contactFirstName);
		$statement->bindValue(':contactLastName',$contactLastName);
		$statement->bindValue(':email',$email);
		$statement->bindValue(':phone',$phone);
		$statement->bindValue(':position',$position);
		$statement->bindValue(':fax',$fax);
		$statement->bindValue(':mobile',$mobile);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$statement->closeCursor(); 
	}
	
	public function updateBusinessDetails($businessTypeID,$abn,$businessStartYear,$businessName,$operationsNature,$tradingName,$applicationID)
	{
		$query = "UPDATE businessdetails 
				  SET businessTypeID = :businessTypeID, 
				  abn = :abn, 
				  businessStartYear = :businessStartYear, 
				  businessName = :businessName,
				  operationsNaure = :operationsNature,
				  tradingName = :tradingName
				  WHERE applicationID = :applicationID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':businessTypeID',$businessTypeID);
		$statement->bindValue(':abn',$abn);
		$statement->bindValue(':businessStartYear',$businessStartYear);
		$statement->bindValue(':businessName',$businessName);
		$statement->bindValue(':operationsNature',$operationsNature);
		$statement->bindValue(':tradingName',$tradingName);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->execute();
		$statement->closeCursor(); 
	}
	
	public function addCreditLimitRequest($applicationID,$creditLimit)
	{
		$query = "INSERT INTO changeCreditLimit
					  (applicationID,newCreditLimit,status,dateCreated)
					  VALUES (:applicationID,:creditLimit,'pending',NOW())";
					  
			//status can be 'pending','approved','rejected'

			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':applicationID',$applicationID);
			$statement->bindValue(':creditLimit',$creditLimit);
			$statement->execute();
			$statement->closeCursor();	
	}
	
	public function checkIfPendingCreditChange($applicationID)
	{
		$query = "SELECT *  
				  FROM changeCreditLimit
				  WHERE applicationID = :applicationID
				  AND status = 'pending'";

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
	
	public function getAllPendingCreditChanges()
	{
		$query = "SELECT changeCreditLimit.*, application.*
				  FROM changeCreditLimit, application
				  WHERE changeCreditLimit.applicationID = application.applicationID
				  AND changeCreditLimit.status = 'pending'
				  ORDER BY dateCreated DESC";

		$statement = $this->database->db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result;
		} else {
			return false;
		}
	}
	
	public function respondToCreditLimitRequest($requestID,$status)
	{
		$query = "UPDATE changecreditlimit SET status = :status WHERE requestID = :requestID";
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':status',$status);
		$statement->bindValue(':requestID',$requestID);
		$statement->execute();
		$statement->closeCursor(); 
	}
	
}
?>