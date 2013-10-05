<?php

class Apply_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function addApplication($firstName,$lastName,$email,$phone,$position,$fax,$existingSupplierPhone,$mobile,
							 $creditLimit,$existingFuelSupplier,$fuelCardTradingName) 
	{
		
		$query = "INSERT INTO application 
				  (contactFirstName,contactLastName,email,phone,position,fax,existingSupplierPhone,
				   mobile,applicationStatus,applicationDate,creditLimit,existingFuelSupplier,tradingNameForFuelCards) 
				  VALUES (:firstName,:lastName,:email,:phone,:position,:fax,:existingSuppPhone,
						  :mobile,'pending',CURDATE(),:creditLimit,:existingFuelSupplier,:fuelCardTradingName)";
		
		// Application status must be 'pending','approved','rejected'
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':firstName',$firstName);
		$statement->bindValue(':lastName',$lastName);
		$statement->bindValue(':email',$email);
		$statement->bindValue(':phone',$position);
		$statement->bindValue(':fax',$fax);
		$statement->bindValue(':existingSuppPhone',$existingSupplierPhone);
		$statement->bindValue(':mobile',$mobile);
		$statement->bindValue(':creditLimit',$creditLimit);
		$statement->bindValue(':existingFuelSupplier',$existingFuelSupplier);
		$statement->bindValue(':fuelCardTradingName',$fuelCardTradingName);
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('application');
	}
	
	public function addApplicationReferences($applicationID,$name,$phone)
	{
		$query = "INSERT INTO applicationreferences (applicationID,refPhone,referenceName)
				  VALUES (:applicationID,:name,:phone)";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':name',$name);
		$statement->bindValue(':phone',$phone);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function getBusinessTypeID($businessType)
	{
		$query = "SELECT businessTypeID FROM BusinessType WHERE businessType = :businessType";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':businessType',$businessType);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result['businessTypeID'];
		} else {
			return false;
		}
		
	}
	
	public function addApplicationBusinessDetails($applicationID,$businessTypeID,$abn,$startYear,$busName,$operations,$tradingName)
	{
		$query = "INSERT INTO businessdetails
				  VALUES (:applicationID,:businessType,:abn,:startYear,:name,:operations,:tradingName)";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':businessTypeID',$businessTypeID);
		$statement->bindValue(':abn',$abn);
		$statement->bindValue(':startYear',$busName);
		$statement->bindValue(':operations',$operations);
		$statement->bindValue(':tradingName',$tradingName);
		$statement->execute();
		$statement->closeCursor();
	}
	
	public function addBusinessPartner($applicationID,$name,$phone,$postcode,$address,$state)
	{
		$query = "INSERT INTO businesspartners
				  (applicationID,partnerName,partnerPhone,partnerPostcode,partnerAddress,partnerState)
				  VALUES (:applicationID,:name,:phone,:postcode,:address,:state)";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':name',$name);
		$statement->bindValue(':phone',$phone);
		$statement->bindValue(':postcode',$postcode);
		$statement->bindValue(':address',$address);
		$statement->bindValue(':state',$state);
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('businesspartners');	
	}
	
	public function addFuelCards($applicationID,$name,$registration,$pinRequired)
	{
		$query = "INSERT INTO fuelcards
				  (applicationID,accountID,cardHolderName,cardStatus,dateCreated,registrationNo,pinRequired,pin)
				  VALUES (:applicationID,NULL,:name,'disabled',CURDATE(),:registration,:pinRequired,NULL)";
				
		//cardStatus can take values 'enabled','disabled','cancelled'
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':name',$name);
		$statement->bindValue(':registration',$registration
		if ($pinRequired == 'yes')
		{
			$statement->bindValue(':pinRequired',TRUE);
		} else {
			$statement->bindValue(':pinRequired',FALSE);
		}
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('fuelcards');	
	}
	
	public function getProductTypeID($productName)
	{
		$query = "SELECT productTypeID FROM producttype WHERE productName = :productName";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':productName',$productName);
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
			$query = "INSERT INTO fuelcardprodcuts
					  (fuelCardID,productTypeID)
					  VALUES (:fuelCardID,:productTypeID)";
				
			//cardStatus can take values 'enabled','disabled','cancelled'
		
			$statement = $this->database->db->prepare($query);
			$statement->bindValue(':fuelCardID',$fuelcardID);
			$statement->bindValue(':productTypeID',$productID);
			$statement->execute();
			$statement->closeCursor();
		}
	}
	
	public function addDirectDebitInfo($applicationID,$bankName,$accountType,$accountName,$accountNo,$bsb)
	{
		$query = "INSERT INTO directdebitinfo
				  (applicationID,financialInstitution,cheque,accountNo,bsb,savings,accountName)
				  VALUES (:applicationID,:bankName,:cheque,:accountNo,:bsb,:savings,:accountName)";

		//cardStatus can take values 'enabled','disabled','cancelled'

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':bankName',$bankName);
		if ($accountType == 'savings')
		{
			$statement->bindValue(':cheque',FALSE);
			$statement->bindValue(':savings',TRUE);
		} else {
			$statement->bindValue(':cheque',TRUE);
			$statement->bindValue(':savings',FALSE);
		}
		$statement->bindValue(':accountNo',$accountNo);
		$statement->bindValue(':bsb',$bsb);
		$statement->bindValue(':accountName',$accountName);
		$statement->execute();
		$statement->closeCursor();	
	}
	
	public function getCreditCardTypeID($creditCardName)
	{
		$query = "SELECT creditCardTypeID FROM creditcardtype WHERE creditCardType = :creditCardName";
		
		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':creditCardName',$creditCardName);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		
		if (count($result) > 0 )
		{
			return $result['creditCardTypeID'];
		} else {
			return false;
		}
	}
	
	//monthPayDay needs to be in MySQL date format: 'YYYY-MM-DD'
	public function addCreditCard($applicationID,$creditCardTypeID,$cardNo,$cardHolderName,$monthPayDay,$expiryDate)
	{
		$query = "INSERT INTO directdebitinfo
				  (applicationID,creditCardTypeID,creditCardNo,cardHolderName,monthlyPaymentDate,expiryDate)
				  VALUES (:applicationID,:creditCardTypeID,:cardNo,:cardHolderName,:monthPayDay,:expiryDate)";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':applicationID',$applicationID);
		$statement->bindValue(':creditCardTypeID',$creditCardTypeID);
		$statement->bindValue(':cardNo',$cardNo);
		$statement->bindValue(':cardHolderName',$cardHolderName);
		$statement->bindValue(':monthPayDay',$monthPayDay);
		$statement->bindValue(':expiryDate',$expiryDate);
		$statement->execute();
		$statement->closeCursor();	
	}
	
	//dateOfBirth needs to be in MySQL date format: 'YYYY-MM-DD'
	public function addBusinessPartnerAuthorisations($businessPartnerID,$licenceNo,$dateOfBirth,$sigObtained,$acceptedTerms)
	{
		$query = "INSERT INTO partnersauthorization
				  VALUES (:bizPartnerID,:licence,:DOB,:sigObtained,:termsAccepted)";

		$statement = $this->database->db->prepare($query);
		$statement->bindValue(':bizPartnerID',$businessPartnerID);
		$statement->bindValue(':licence',$licenceNo);
		
		$statement->bindValue(':DOB',$dateOfBirth);
		$statement->bindValue(':sigObtained',$sigObtained);
		$statement->bindValue(':acceptedTerms',$acceptedTerms);
		$statement->execute();
		$statement->closeCursor();	
	}
}