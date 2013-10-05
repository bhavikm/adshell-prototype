<?php

class Apply_Model {

	private $database;
    
    public function __construct()
    {
        $this->database = new Database_Library;
    }
	
	public function addApplication($firstName,$lastName,$email,$phone,$position,$fax,$existingSupplierPhone,$mobile,
							 $creditLimit,$existingFuelSupplier) 
	{
		
		$query = "INSERT INTO application 
				  (contactFirstName,contactLastName,email,phone,position,fax,existingSupplierPhone,
				   mobile,applicationStatus,applicationDate,creditLimit,existingFuelSupplier) 
				  VALUES (:firstName,:lastName,:email,:phone,:position,:fax,:existingSuppPhone,
						  :mobile,'pending',NOW(),:creditLimit,:existingFuelSupplier)";
		
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
		$statement->execute();
		$statement->closeCursor();
		
		return $this->database->db->lastInsertId('application');
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
				  VALUES (:applicationID,NULL,:name,'disabled',NOW(),:registration,:pinRequired,NULL)";
				
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

}