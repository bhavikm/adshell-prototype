<?php

class Apply_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'apply';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{	
	
		$header = new View_Model('header');
		$header->assign('active_nav','apply');
		$footer = new View_Model('footer');
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($getVars['page']))
		{
			switch ($getVars['page'])
			{	
				case '2':
					$errorAndValids = $this->validatePage1($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 0)
					{
						$this->template = 'apply-2';
					} else {
						// move on to next page
						$this->template = 'apply-3';
					}
				break;
				
				case '3':
					$errorAndValids = $this->validatePage2($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 0)
					{
						$this->template = 'apply-3';
					} else {
						// move on to next page
						$getVars['page'] = '4';
					}
				break;
				
				case '4':
					$errorAndValids = $this->validatePage3($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 1)
					{
						$this->template = 'apply-4';
						break;
					}
					
				case '5':
					$errorAndValids = $this->validatePage4($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 2)
					{
						$this->template = 'apply-5';
						break;
					}
				
				case '6':
					$errorAndValids = $this->validatePage5($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 0)
					{
						$this->template = 'apply-6';
						break;
					}
				
				case '7':
					$errorAndValids = $this->validatePage6($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 1)
					{
						$this->template = 'apply-7';
						break;
					}
				
				case '8':
					$errorAndValids = $this->validatePage7($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 1)
					{
						$this->template = 'apply-8';
						break;
					}
				
				case '9':
					$completedForm = $this->getCompletedFormArray();
					$this->template = 'apply-9';
				break;
				
				case '10':
					$this->template = 'apply-10';
				break;
			}
		
		}
		
		
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		//assign the errors array to the template data
		$view->assign('errors', $errorAndValids['errors']);
		$view->assign('valids', $errorAndValids['valids']);
		
		$view->render();
	}
	
	private function validatePage1($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($fieldValues['biztype']))
		{
			if ($fieldValues['biztype']  == 'select')
			{
				$errorAndValids['errors']['biztype'] = 'You must select a business type.';
			} else {
				$_SESSION['biztype'] = $fieldValues['biztype'];
				$errorAndValids['valids']['biztype'] = $fieldValues['biztype'];
			}
		}
		
		if (isset($fieldValues['businessName']))
		{
			if (strlen($fieldValues['businessName']) == 0 )
			{
				$errorAndValids['errors']['businessName'] = 'Business name must not be empty.';
			} elseif (strlen($fieldValues['businessName']) > 40) { 
				$errorAndValids['errors']['businessName'] = 'Business name must be 40 characters or less.';
			} else {
				$_SESSION['businessName'] = $fieldValues['businessName'];
				$errorAndValids['valids']['businessName'] = $fieldValues['businessName'];
			}
		}
		
		if (isset($fieldValues['tradingName']))
		{
			if (strlen($fieldValues['tradingName']) == 0 )
			{
				$errorAndValids['errors']['tradingName'] = 'Trading name must not be empty.';
			} elseif (strlen($fieldValues['tradingName']) > 60) { 
				$errorAndValids['errors']['tradingName'] = 'Trading name must be 60 characters or less.';
			} else {
				$_SESSION['tradingName'] = $fieldValues['tradingName'];
				$errorAndValids['valids']['tradingName'] = $fieldValues['tradingName'];
			}
		}
		
		if (isset($fieldValues['yearBizStart']))
		{
			if (strlen($fieldValues['yearBizStart']) == 0 )
			{
				$errorAndValids['errors']['yearBizStart'] = 'Business start year must not be empty.';
			} elseif (strlen($fieldValues['yearBizStart']) != 4) { 
				$errorAndValids['errors']['yearBizStart'] = 'Business start year must be valid.';
			} else {
				$_SESSION['yearBizStart'] = $fieldValues['yearBizStart'];
				$errorAndValids['valids']['yearBizStart'] = $fieldValues['yearBizStart'];
			}
		}
		
		if (isset($fieldValues['abn']))
		{
			if (strlen($fieldValues['abn']) == 0 )
			{
				$errorAndValids['errors']['abn'] = 'ABN/ACN not be empty.';
			} elseif (strlen($fieldValues['abn']) > 11) { 
				$errorAndValids['errors']['abn'] = 'ABN/ACN must be 11 digits or less.';
			} else {
				$_SESSION['abn'] = $fieldValues['abn'];
				$errorAndValids['valids']['abn'] = $fieldValues['abn'];
			}
		}
		
		if (isset($fieldValues['operations']))
		{
			if (strlen($fieldValues['operations']) == 0 )
			{
				$errorAndValids['errors']['operations'] = 'Nature of operations not be empty.';
			} elseif (strlen($fieldValues['operations']) > 200) { 
				$errorAndValids['errors']['operations'] = 'Nature of operations must be 200 characters or less.';
			} else {
				$_SESSION['operations'] = $fieldValues['operations'];
				$errorAndValids['valids']['operations'] = $fieldValues['operations'];
			}
		}
		
		if (isset($fieldValues['contactFirstName']))
		{
			if (strlen($fieldValues['contactFirstName']) == 0 )
			{
				$errorAndValids['errors']['contactFirstName'] = 'First name must not be empty.';
			} elseif (strlen($fieldValues['contactFirstName']) > 15) { 
				$errorAndValids['errors']['contactFirstName'] = 'First name must be 15 characters or less.';
			} else {
				$_SESSION['contactFirstName'] = $fieldValues['contactFirstName'];
				$errorAndValids['valids']['contactFirstName'] = $fieldValues['contactFirstName'];
			}
		}
		
		if (isset($fieldValues['contactLastName']))
		{
			if (strlen($fieldValues['contactLastName']) == 0 )
			{
				$errorAndValids['errors']['contactLastName'] = 'Last name must not be empty.';
			} elseif (strlen($fieldValues['contactLastName']) > 15) { 
				$errorAndValids['errors']['contactLastName'] = 'Last name must be 15 characters or less.';
			} else {
				$_SESSION['contactLastName'] = $fieldValues['contactLastName'];
				$errorAndValids['valids']['contactLastName'] = $fieldValues['contactLastName'];
			}
		}
		
		if (isset($fieldValues['inputPosition']))
		{
			if (strlen($fieldValues['inputPosition']) == 0 )
			{
				$errorAndValids['errors']['inputPosition'] = 'Position must not be empty.';
			} elseif (strlen($fieldValues['inputPosition']) > 40) { 
				$errorAndValids['errors']['inputPosition'] = 'Position must be 40 characters or less.';
			} else {
				$_SESSION['inputPosition'] = $fieldValues['inputPosition'];
				$errorAndValids['valids']['inputPosition'] = $fieldValues['inputPosition'];
			}
		}
		
		if (isset($fieldValues['inputPhone']))
		{
			if (strlen($fieldValues['inputPhone']) == 0 )
			{
				$errorAndValids['errors']['inputPhone'] = 'Phone must not be empty.';
			} elseif (strlen($fieldValues['inputPhone']) > 10) { 
				$errorAndValids['errors']['inputPhone'] = 'Phone number must be 10 digits or less.';
			} else {
				$_SESSION['inputPhone'] = $fieldValues['inputPhone'];
				$errorAndValids['valids']['inputPhone'] = $fieldValues['inputPhone'];
			}
		}
		
		if (isset($fieldValues['inputFax']))
		{
			if (strlen($fieldValues['inputFax']) == 0 )
			{
				$errorAndValids['errors']['inputFax'] = 'Fax must not be empty.';
			} elseif (strlen($fieldValues['inputFax']) > 10) { 
				$errorAndValids['errors']['inputFax'] = 'Fax number must be 10 digits or less.';
			} else {
				$_SESSION['inputFax'] = $fieldValues['inputFax'];
				$errorAndValids['valids']['inputFax'] = $fieldValues['inputFax'];
			}
		}
		
		if (isset($fieldValues['inputMobile']))
		{
			if (strlen($fieldValues['inputMobile']) == 0 )
			{
				$errorAndValids['errors']['inputMobile'] = 'Mobile must not be empty.';
			} elseif (strlen($fieldValues['inputMobile']) > 10) { 
				$errorAndValids['errors']['inputMobile'] = 'Mobile number must be 10 digits or less.';
			} else {
				$_SESSION['inputMobile'] = $fieldValues['inputMobile'];
				$errorAndValids['valids']['inputMobile'] = $fieldValues['inputMobile'];
			}
		}
		
		if (isset($fieldValues['inputEmail1']))
		{
			if (strlen($fieldValues['inputEmail1']) == 0 )
			{
				$errorAndValids['errors']['inputEmail1'] = 'Email address must not be empty.';
			} elseif (strlen($fieldValues['inputEmail1']) > 80) { 
				$errorAndValids['errors']['inputEmail1'] = 'Email address must be 80 characters or less.';
			} else {
				$_SESSION['inputEmail1'] = $fieldValues['inputEmail1'];
				$errorAndValids['valids']['inputEmail1'] = $fieldValues['inputEmail1'];
			}
		}
		
		if (isset($fieldValues['creditLimit']))
		{
			if (strlen($fieldValues['creditLimit']) == 0 )
			{
				$errorAndValids['errors']['creditLimit'] = 'Credit limit must not be empty.';
			} elseif (strlen($fieldValues['creditLimit']) > 5) { 
				$errorAndValids['errors']['creditLimit'] = 'Credit limit must be 5 digits or less.';
			} else {
				$_SESSION['creditLimit'] = $fieldValues['creditLimit'];
				$errorAndValids['valids']['creditLimit'] = $fieldValues['creditLimit'];
			}
		}
		
		
		return $errorAndValids;
	}
	
	
	private function validatePage2($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($fieldValues['refName1']))
		{
			if (strlen($fieldValues['refName1']) == 0 )
			{
				$errorAndValids['errors']['refName1'] = 'Reference name must not be empty.';
			} elseif (strlen($fieldValues['refName1']) > 40) { 
				$errorAndValids['errors']['refName1'] = 'Reference name must be 40 characters or less.';
			} else {
				$_SESSION['refName1'] = $fieldValues['refName1'];
				$errorAndValids['valids']['refName1'] = $fieldValues['refName1'];
			}
		}
		
		if (isset($fieldValues['refPhone1']))
		{
			if (strlen($fieldValues['refPhone1']) == 0)
			{
				$errorAndValids['errors']['refPhone1'] = 'Reference phone must not be empty.';
			} elseif (strlen($fieldValues['refPhone1']) > 10) { 
				$errorAndValids['errors']['refPhone1'] = 'Reference phone number must be 10 digits or less.';
			} else {
				$_SESSION['refPhone1'] = $fieldValues['refPhone1'];
				$errorAndValids['valids']['refPhone1'] = $fieldValues['refPhone1'];
			}
		}
		
		if (isset($fieldValues['refName2']))
		{
			if (strlen($fieldValues['refName2']) == 0 )
			{
				$errorAndValids['errors']['refName2'] = 'Reference name must not be empty.';
			} elseif (strlen($fieldValues['refName2']) > 40) { 
				$errorAndValids['errors']['refName2'] = 'Reference name must be 40 characters or less.';
			} else {
				$_SESSION['refName2'] = $fieldValues['refName2'];
				$errorAndValids['valids']['refName2'] = $fieldValues['refName2'];
			}
		}
		
		if (isset($fieldValues['refPhone2']))
		{
			if (strlen($fieldValues['refPhone2']) == 0)
			{
				$errorAndValids['errors']['refPhone2'] = 'Reference phone must not be empty.';
			} elseif (strlen($fieldValues['refPhone2']) > 10) { 
				$errorAndValids['errors']['refPhone2'] = 'Reference phone number must be 10 digits or less.';
			} else {
				$_SESSION['refPhone2'] = $fieldValues['refPhone2'];
				$errorAndValids['valids']['refPhone2'] = $fieldValues['refPhone2'];
			}
		}
		
		
		if (isset($fieldValues['fuelSupplierName']))
		{
			if (strlen($fieldValues['fuelSupplierName']) == 0 )
			{
				$errorAndValids['errors']['fuelSupplierName'] = 'Fuel supplier name must not be empty.';
			} elseif (strlen($fieldValues['fuelSupplierName']) > 40) { 
				$errorAndValids['errors']['fuelSupplierName'] = 'Fuel supplier name must be 40 characters or less.';
			} else {
				$_SESSION['fuelSupplierName'] = $fieldValues['fuelSupplierName'];
				$errorAndValids['valids']['fuelSupplierName'] = $fieldValues['fuelSupplierName'];
			}
		}
		
		if (isset($fieldValues['fuelSupplierPhone']))
		{
			if (strlen($fieldValues['fuelSupplierPhone']) == 0)
			{
				$errorAndValids['errors']['fuelSupplierPhone'] = 'Fuel supplier phone must not be empty.';
			} elseif (strlen($fieldValues['fuelSupplierPhone']) > 10) { 
				$errorAndValids['errors']['fuelSupplierPhone'] = 'Fuel supplier phone number must be 10 digits or less.';
			} else {
				$_SESSION['fuelSupplierPhone'] = $fieldValues['fuelSupplierPhone'];
				$errorAndValids['valids']['fuelSupplierPhone'] = $fieldValues['fuelSupplierPhone'];
			}
		}
		
		return $errorAndValids;
	}
	
	
	// Validate business partners
	/*  Each business partner has the format:	
	*		Full Name 
	*		Phone
	*		Address
	*		State
	*		Postcode
	*	
	*	A minimum of one business partner is required to be filled in (for sole trader) but more
	* 	can be added if needed
	*
	*/
	private function validatePage3($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());

		if (isset($fieldValues['numberOfPartners']))
		{
			$errorAndValids['valids']['numberOfPartners'] = $fieldValues['numberOfPartners'];
			$numberPartners = (int)$fieldValues['numberOfPartners'];
			$_SESSION['numberOfPartners'] = $numberPartners;
		
			
			// The string prefixes used to get passed field values and set error and valid fields for return
			// Each input box has name="" set to the matching prefix below with a number attached at the end 
			// to indicate the partner number (starting from 1). So for Business Partner 1 the inputs are 
			// are identified by partnerName1, partnerPhone1 etc.
			$partnerNameIdentifier = 'partnerName';
			$partnerPhoneIdentifier = 'partnerPhone';
			$partnerAddressIdentifier = 'partnerAddress';
			$partnerStateIdentifier = 'partnerState';
			$partnerPostcodeIdentifier = 'partnerPostcode';
			
			for ($i = 1; $i <= $numberPartners; $i++)
			{
				// Full name for partner
				if (isset($fieldValues[$partnerNameIdentifier.$i]))
				{
					if (strlen($fieldValues[$partnerNameIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$partnerNameIdentifier.$i] = 'Business partner name must not be empty.';
					} elseif (strlen($fieldValues[$partnerNameIdentifier.$i]) > 40) { 
						$errorAndValids['errors'][$partnerNameIdentifier.$i] = 'Business partner name must be 40 characters or less.';
					} else {
						$_SESSION[$partnerNameIdentifier.$i] = $fieldValues[$partnerNameIdentifier.$i];
						$errorAndValids['valids'][$partnerNameIdentifier.$i] = $fieldValues[$partnerNameIdentifier.$i];
					}
				}
				
				// Phone for partner
				if (isset($fieldValues[$partnerPhoneIdentifier.$i]))
				{
					if (strlen($fieldValues[$partnerPhoneIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$partnerPhoneIdentifier.$i] = 'Business partner phone must not be empty.';
					} elseif (strlen($fieldValues[$partnerPhoneIdentifier.$i]) > 40) { 
						$errorAndValids['errors'][$partnerPhoneIdentifier.$i] = 'Business partner phone must be 10 digits or less.';
					} else {
						$_SESSION[$partnerPhoneIdentifier.$i] = $fieldValues[$partnerPhoneIdentifier.$i];
						$errorAndValids['valids'][$partnerPhoneIdentifier.$i] = $fieldValues[$partnerPhoneIdentifier.$i];
					}
				}
				
				// Address string for partner
				if (isset($fieldValues[$partnerAddressIdentifier.$i]))
				{
					if (strlen($fieldValues[$partnerAddressIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$partnerAddressIdentifier.$i] = 'Business partner address must not be empty.';
					} elseif (strlen($fieldValues[$partnerAddressIdentifier.$i]) > 200) { 
						$errorAndValids['errors'][$partnerAddressIdentifier.$i] = 'Business partner address must be 200 characters or less.';
					} else {
						$_SESSION[$partnerAddressIdentifier.$i] = $fieldValues[$partnerAddressIdentifier.$i];
						$errorAndValids['valids'][$partnerAddressIdentifier.$i] = $fieldValues[$partnerAddressIdentifier.$i];
					}
				}
				
				// State select box for partner, just check if its not on first 'select...' option
				if (isset($fieldValues[$partnerStateIdentifier.$i]))
				{
					if ($fieldValues[$partnerStateIdentifier.$i] == 'select')
					{
						$errorAndValids['errors'][$partnerStateIdentifier.$i] = 'Must select a state for the business partner.';
					} else {
						$_SESSION[$partnerStateIdentifier.$i] = $fieldValues[$partnerStateIdentifier.$i];
						$errorAndValids['valids'][$partnerStateIdentifier.$i] = $fieldValues[$partnerStateIdentifier.$i];
					}
				}
				
				// Postcode for partner
				if (isset($fieldValues[$partnerPostcodeIdentifier.$i]))
				{
					if (strlen($fieldValues[$partnerPostcodeIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$partnerPostcodeIdentifier.$i] = 'Business partner postcode must not be empty.';
					} elseif (strlen($fieldValues[$partnerPostcodeIdentifier.$i]) != 4) { 
						$errorAndValids['errors'][$partnerPostcodeIdentifier.$i] = 'Business partner postcode must be 4 digits.';
					} else {
						$_SESSION[$partnerPostcodeIdentifier.$i] = $fieldValues[$partnerPostcodeIdentifier.$i];
						$errorAndValids['valids'][$partnerPostcodeIdentifier.$i] = $fieldValues[$partnerPostcodeIdentifier.$i];
					}
				}
			
			}
		} else {
			$errorAndValids['valids']['numberOfPartners'] = 1;
		}
		
		return $errorAndValids;
	}
	
	
	private function validatePage4($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		//have to check for trading name
		if (isset($fieldValues['tradingName']))
		{
			if (strlen($fieldValues['tradingName']) == 0 )
			{
				$errorAndValids['errors']['tradingName'] = 'Trading name must not be empty.';
			} elseif (strlen($fieldValues['tradingName']) > 40) { 
				$errorAndValids['errors']['tradingName'] = 'Trading name must be 40 characters or less.';
			} else {
				$_SESSION['tradingName'] = $fieldValues['tradingName'];
				$errorAndValids['valids']['tradingName'] = $fieldValues['tradingName'];
			}
		}
		
		$cardHolderNameIdentifier = 'cardHolderName';
		$cardHolderRegistrationIdentifier = 'registrationNo';
		$cardHolderAllProductsIdentifier = 'allFuelCardProducts';
		$cardHolderProductsIdentifier = 'fuelCardProducts';
		$cardHolderPinRequiredIdentifier = 'pinRequired';
		
		if (isset($fieldValues['numberOfCardholders']))
		{
			$errorAndValids['valids']['numberOfCardholders'] = $fieldValues['numberOfCardholders'];
			$numberCardholders = (int)$fieldValues['numberOfCardholders'];
			$_SESSION['numberOfCardholders'] = $numberCardholders;

			for ($i = 1; $i <= $numberCardholders; $i++)
			{
				// Card holder name
				if (isset($fieldValues[$cardHolderNameIdentifier.$i]))
				{
					if (strlen($fieldValues[$cardHolderNameIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$cardHolderNameIdentifier.$i] = 'Card holder name must not be empty.';
					} elseif (strlen($fieldValues[$cardHolderNameIdentifier.$i]) > 40) { 
						$errorAndValids['errors'][$cardHolderNameIdentifier.$i] = 'Card holder name must be 40 characters or less.';
					} else {
						$_SESSION[$cardHolderNameIdentifier.$i] = $fieldValues[$cardHolderNameIdentifier.$i];
						$errorAndValids['valids'][$cardHolderNameIdentifier.$i] = $fieldValues[$cardHolderNameIdentifier.$i];
					}
				}
				
				// Card Holder registration number
				if (isset($fieldValues[$cardHolderRegistrationIdentifier.$i]))
				{
					if (strlen($fieldValues[$cardHolderRegistrationIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$cardHolderRegistrationIdentifier.$i] = 'Card holder registration number must not be empty.';
					} elseif (strlen($fieldValues[$cardHolderRegistrationIdentifier.$i]) > 15) { 
						$errorAndValids['errors'][$cardHolderRegistrationIdentifier.$i] = 'Card holder registration number must be 15 character or less.';
					} else {
						$_SESSION[$cardHolderRegistrationIdentifier.$i] = $fieldValues[$cardHolderRegistrationIdentifier.$i];
						$errorAndValids['valids'][$cardHolderRegistrationIdentifier.$i] = $fieldValues[$cardHolderRegistrationIdentifier.$i];
					}
				}
				
				// Pin required select box
				if (isset($fieldValues[$cardHolderPinRequiredIdentifier.$i]))
				{
					$_SESSION[$cardHolderPinRequiredIdentifier.$i] = $fieldValues[$cardHolderPinRequiredIdentifier.$i];
					$errorAndValids['valids'][$cardHolderPinRequiredIdentifier.$i] = $fieldValues[$cardHolderPinRequiredIdentifier.$i];
				}
				
				// Checked products, initially create array for all product options as false for unselected
				$errorAndValids['valids'][$cardHolderProductsIdentifier.$i] = array( "unleaded" => false, "biodiesel" => false, "unleadedMax" => false, "lpg" => false, "gas" => false, "carWash" => false, "shop" => false, "premiumUnleaded" => false, "octane" => false );
				if (isset($fieldValues[$cardHolderProductsIdentifier.$i]))
				{
					if (count($fieldValues[$cardHolderProductsIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$cardHolderProductsIdentifier.$i] = 'Must select at least one product for fuel card.';
					} else {
						$_SESSION[$cardHolderProductsIdentifier.$i] = $fieldValues[$cardHolderProductsIdentifier.$i];
						// add for each selected item to be set to true in the array of all product options
						foreach ($fieldValues[$cardHolderProductsIdentifier.$i] as $selectedProductVal)
						{
							$errorAndValids['valids'][$cardHolderProductsIdentifier.$i][$selectedProductVal] = true;
						}
					}
				} else {
					$errorAndValids['errors'][$cardHolderProductsIdentifier.$i] = 'Must select at least one product for fuel card.';
				}
			
			}
			
			
		} else {
			$errorAndValids['valids']['numberOfCardholders'] = 1;
			// have to setup array of fuel card options 
			$errorAndValids['valids'][$cardHolderProductsIdentifier.'1'] = array( "unleaded" => false, "biodiesel" => false, "unleadedMax" => false, "lpg" => false, "gas" => false, "carWash" => false, "shop" => false, "premiumUnleaded" => false, "octane" => false );
		}	

	
		return $errorAndValids;
	}
	
	private function validatePage5($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($fieldValues['paymentType']))
		{
			if ($fieldValues['paymentType'] == 'select')
			{
				$errorAndValids['errors']['paymentType'] = 'Must select and complete a payment option.';
			} else {
				$_SESSION['paymentType'] = $fieldValues['paymentType'];
				$errorAndValids['valids']['paymentType'] = $fieldValues['paymentType'];
				
				if ($fieldValues['paymentType'] == 'directDebit')
				{
					$directDebitAuthorizeIdentifier = 'ddAuthoriseName';
					$directDebitAccountTypeIdentifier = 'accountType';
					$directDebitBankNameIdentifier = 'bankName';
					$directDebitAccountNameIdentifier = 'accountName';
					$directDebitBSBIdentifier = 'bsbNo';
					$directDebitAccountNumberIdentifier = 'accountNo';
					$directDebitAcknowledgeIdentifier = 'ddAcknowdledgeName';
					
					// Authorisation name
					if (isset($fieldValues[$directDebitAuthorizeIdentifier]))
					{
						if (strlen($fieldValues[$directDebitAuthorizeIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitAuthorizeIdentifier] = 'Authorisation name must not be empty.';
						} elseif (strlen($fieldValues[$directDebitAuthorizeIdentifier]) > 40) { 
							$errorAndValids['errors'][$directDebitAuthorizeIdentifier] = 'Authorisation name must be 40 character or less.';
						} else {
							$_SESSION[$directDebitAuthorizeIdentifier] = $fieldValues[$directDebitAuthorizeIdentifier];
							$errorAndValids['valids'][$directDebitAuthorizeIdentifier] = $fieldValues[$directDebitAuthorizeIdentifier];
						}
					}
					
					// Account type
					if (isset($fieldValues[$directDebitAccountTypeIdentifier]))
					{
						if ($fieldValues[$directDebitAccountTypeIdentifier] == 'select')
						{
							$errorAndValids['errors'][$directDebitAccountTypeIdentifier] = 'You must select an account type.';
						} else {
							$_SESSION[$directDebitAccountTypeIdentifier] = $fieldValues[$directDebitAccountTypeIdentifier];
							$errorAndValids['valids'][$directDebitAccountTypeIdentifier] = $fieldValues[$directDebitAccountTypeIdentifier];
						}
					}
					
					// Bank name
					if (isset($fieldValues[$directDebitBankNameIdentifier]))
					{
						if (strlen($fieldValues[$directDebitBankNameIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitBankNameIdentifier] = 'Financial Institution must not be empty.';
						} elseif (strlen($fieldValues[$directDebitBankNameIdentifier]) > 40) { 
							$errorAndValids['errors'][$directDebitBankNameIdentifier] = 'Financial Institution must be 40 character or less.';
						} else {
							$_SESSION[$directDebitBankNameIdentifier] = $fieldValues[$directDebitBankNameIdentifier];
							$errorAndValids['valids'][$directDebitBankNameIdentifier] = $fieldValues[$directDebitBankNameIdentifier];
						}
					}
					
					// Account name
					if (isset($fieldValues[$directDebitAccountNameIdentifier]))
					{
						if (strlen($fieldValues[$directDebitAccountNameIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitAccountNameIdentifier] = 'Account name must not be empty.';
						} elseif (strlen($fieldValues[$directDebitAccountNameIdentifier]) > 40) { 
							$errorAndValids['errors'][$directDebitAccountNameIdentifier] = 'Account name must be 40 character or less.';
						} else {
							$_SESSION[$directDebitAccountNameIdentifier] = $fieldValues[$directDebitAccountNameIdentifier];
							$errorAndValids['valids'][$directDebitAccountNameIdentifier] = $fieldValues[$directDebitAccountNameIdentifier];
						}
					}
					
					// BSB
					if (isset($fieldValues[$directDebitBSBIdentifier]))
					{
						if (strlen($fieldValues[$directDebitBSBIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitBSBIdentifier] = 'BSB must not be empty.';
						} elseif (strlen($fieldValues[$directDebitBSBIdentifier]) != 6) { 
							$errorAndValids['errors'][$directDebitBSBIdentifier] = 'BSB must be 6 digits.';
						} else {
							$_SESSION[$directDebitBSBIdentifier] = $fieldValues[$directDebitBSBIdentifier];
							$errorAndValids['valids'][$directDebitBSBIdentifier] = $fieldValues[$directDebitBSBIdentifier];
						}
					}
					
					// Account number
					if (isset($fieldValues[$directDebitAccountNumberIdentifier]))
					{
						if (strlen($fieldValues[$directDebitAccountNumberIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitAccountNumberIdentifier] = 'Account number must not be empty.';
						} elseif (strlen($fieldValues[$directDebitAccountNumberIdentifier]) > 9) { 
							$errorAndValids['errors'][$directDebitAccountNumberIdentifier] = 'Account number must be 9 digits or less.';
						} else {
							$_SESSION[$directDebitAccountNumberIdentifier] = $fieldValues[$directDebitAccountNumberIdentifier];
							$errorAndValids['valids'][$directDebitAccountNumberIdentifier] = $fieldValues[$directDebitAccountNumberIdentifier];
						}
					}
					
					// Acknowledgement name
					if (isset($fieldValues[$directDebitAcknowledgeIdentifier]))
					{
						if (strlen($fieldValues[$directDebitAcknowledgeIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$directDebitAcknowledgeIdentifier] = 'Acknowledgement name must not be empty.';
						} elseif (strlen($fieldValues[$directDebitAcknowledgeIdentifier]) > 40) { 
							$errorAndValids['errors'][$directDebitAcknowledgeIdentifier] = 'Acknowledgement name must be 40 character or less.';
						} else {
							$_SESSION[$directDebitAcknowledgeIdentifier] = $fieldValues[$directDebitAcknowledgeIdentifier];
							$errorAndValids['valids'][$directDebitAcknowledgeIdentifier] = $fieldValues[$directDebitAcknowledgeIdentifier];
						}
					}
					
				} else {
					
					$creditCardAuthorizeIdentifier = 'ccAuthoriseName';
					$creditCardPaymentDateIdentifier = 'ccPaymentDate';
					$creditCardNameIdentifier = 'ccName';
					$creditCardNumberIdentifier = 'ccNo';
					$creditCardExpiryMonthIdentifier = 'ccExpiryMonth';
					$creditCardExpiryYearIdentifier = 'ccExpiryYear';
					$creditCardExpiryDateIdentifier = 'ccExpiryDate';
					$creditCardTypeIdentifier = 'ccType';
					$creditCardAcknowledgeIdentifier = 'ccAcknowdledgeName';
					
					// Authorisation name
					if (isset($fieldValues[$creditCardAuthorizeIdentifier]))
					{
						if (strlen($fieldValues[$creditCardAuthorizeIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$creditCardAuthorizeIdentifier] = 'Authorisation name must not be empty.';
						} elseif (strlen($fieldValues[$creditCardAuthorizeIdentifier]) > 40) { 
							$errorAndValids['errors'][$creditCardAuthorizeIdentifier] = 'Authorisation name must be 40 character or less.';
						} else {
							$_SESSION[$creditCardAuthorizeIdentifier] = $fieldValues[$creditCardAuthorizeIdentifier];
							$errorAndValids['valids'][$creditCardAuthorizeIdentifier] = $fieldValues[$creditCardAuthorizeIdentifier];
						}
					}
					
					// Monthly Payment Date
					if (isset($fieldValues[$creditCardPaymentDateIdentifier]))
					{
						if ($fieldValues[$creditCardPaymentDateIdentifier] == 'select')
						{
							$errorAndValids['errors'][$creditCardPaymentDateIdentifier] = 'You must select a payment date.';
						} else {
							$_SESSION[$creditCardPaymentDateIdentifier] = $fieldValues[$creditCardPaymentDateIdentifier];
							$errorAndValids['valids'][$creditCardPaymentDateIdentifier] = $fieldValues[$creditCardPaymentDateIdentifier];
						}
					}
					
					//Credit card name
					if (isset($fieldValues[$creditCardNameIdentifier]))
					{
						if (strlen($fieldValues[$creditCardNameIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$creditCardNameIdentifier] = 'Credit card name must not be empty.';
						} elseif (strlen($fieldValues[$creditCardNameIdentifier]) > 40) { 
							$errorAndValids['errors'][$creditCardNameIdentifier] = 'Credit card name must be 40 character or less.';
						} else {
							$_SESSION[$creditCardNameIdentifier] = $fieldValues[$creditCardNameIdentifier];
							$errorAndValids['valids'][$creditCardNameIdentifier] = $fieldValues[$creditCardNameIdentifier];
						}
					}
					
					//Credit card number
					if (isset($fieldValues[$creditCardNumberIdentifier]))
					{
						if (strlen($fieldValues[$creditCardNumberIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$creditCardNumberIdentifier] = 'Credit card number must not be empty.';
						} elseif (strlen($fieldValues[$creditCardNumberIdentifier]) != 16) { 
							$errorAndValids['errors'][$creditCardNumberIdentifier] = 'Credit card number must be 16 digits.';
						} else {
							$_SESSION[$creditCardNumberIdentifier] = $fieldValues[$creditCardNumberIdentifier];
							$errorAndValids['valids'][$creditCardNumberIdentifier] = $fieldValues[$creditCardNumberIdentifier];
						}
					}
					
					// Expiry Date
					if ($fieldValues[$creditCardExpiryMonthIdentifier] == 'select' || $fieldValues[$creditCardExpiryYearIdentifier] == 'select')
					{
						$errorAndValids['errors'][$creditCardExpiryDateIdentifier] = 'You must select an expiry date.';
						
						if ($fieldValues[$creditCardExpiryMonthIdentifier] != 'select')
						{
							$_SESSION[$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
							$errorAndValids['valids'][$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
						}
						
						if ($fieldValues[$creditCardExpiryYearIdentifier] != 'select')
						{
							$_SESSION[$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
							$errorAndValids['valids'][$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
						}	
						
					} else {
						$_SESSION[$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
						$errorAndValids['valids'][$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
						
						$_SESSION[$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
						$errorAndValids['valids'][$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
					}
					
					// Card type
					if (isset($fieldValues[$creditCardTypeIdentifier]))
					{
						if ($fieldValues[$creditCardTypeIdentifier] == 'select')
						{
							$errorAndValids['errors'][$creditCardTypeIdentifier] = 'You must select a card type.';
						} else {
							$_SESSION[$creditCardTypeIdentifier] = $fieldValues[$creditCardTypeIdentifier];
							$errorAndValids['valids'][$creditCardTypeIdentifier] = $fieldValues[$creditCardTypeIdentifier];
						}
					}
					
					// Acknowledgement name
					if (isset($fieldValues[$creditCardAcknowledgeIdentifier]))
					{
						if (strlen($fieldValues[$creditCardAcknowledgeIdentifier]) == 0 )
						{
							$errorAndValids['errors'][$creditCardAcknowledgeIdentifier] = 'Acknowledgement name must not be empty.';
						} elseif (strlen($fieldValues[$creditCardAcknowledgeIdentifier]) > 40) { 
							$errorAndValids['errors'][$creditCardAcknowledgeIdentifier] = 'Acknowledgement name must be 40 character or less.';
						} else {
							$_SESSION[$creditCardAcknowledgeIdentifier] = $fieldValues[$creditCardAcknowledgeIdentifier];
							$errorAndValids['valids'][$creditCardAcknowledgeIdentifier] = $fieldValues[$creditCardAcknowledgeIdentifier];
						}
					}
					
				}
			}
		}
		
		return $errorAndValids;
	}
	
	private function validatePage6($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		
		if (isset($_SESSION['numberOfPartners']))
		{
			$errorAndValids['valids']['numberOfPartners'] = $_SESSION['numberOfPartners'];
			$numberPartners = (int)$_SESSION['numberOfPartners'];
			
			for ($i = 1; $i <= $numberPartners; $i++)
			{
				$authoriseAckNameIdentifier = 'authoriseAckName'.$i;
				$authoriseAckDOBIdentifier = 'authoriseAckDOB'.$i;
				$authoriseAckDOBDayIdentifier = 'authoriseAckDOBDay'.$i;
				$authoriseAckDOBMonthIdentifier = 'authoriseAckDOBMonth'.$i;
				$authoriseAckDOBYearIdentifier = 'authoriseAckDOBYear'.$i;
				$authoriseAckLicenceIdentifier = 'authoriseAckLicence'.$i;
				$authoriseAckSignatureIdentifier = 'authoriseAckSignature'.$i;
			
			
				// Business partner name 1
				if (isset($fieldValues[$authoriseAckNameIdentifier]))
				{
					if (strlen($fieldValues[$authoriseAckNameIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$authoriseAckNameIdentifier] = 'Business partner name must not be empty.';
					} elseif (strlen($fieldValues[$authoriseAckNameIdentifier]) > 40) { 
						$errorAndValids['errors'][$authoriseAckNameIdentifier] = 'Business partner name must be 40 characters or less.';
					} else {
						$_SESSION[$authoriseAckNameIdentifier] = $fieldValues[$authoriseAckNameIdentifier];
						$errorAndValids['valids'][$authoriseAckNameIdentifier] = $fieldValues[$authoriseAckNameIdentifier];
					}
				}
				
				// Date of Birth
				if (isset($fieldValues[$authoriseAckDOBDayIdentifier]) && isset($fieldValues[$authoriseAckDOBMonthIdentifier]))
				{
					if ($fieldValues[$authoriseAckDOBDayIdentifier] == 'select' || $fieldValues[$authoriseAckDOBMonthIdentifier] == 'select')
					{
						$errorAndValids['errors'][$authoriseAckDOBIdentifier] = 'You must select a date of birth day and month.';
						
						if ($fieldValues[$authoriseAckDOBDayIdentifier] != 'select')
						{
							$_SESSION[$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
							$errorAndValids['valids'][$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
						}
						
						if ($fieldValues[$authoriseAckDOBMonthIdentifier] != 'select')
						{
							$_SESSION[$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
							$errorAndValids['valids'][$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
						}	
						
					} else {
						$_SESSION[$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
						$errorAndValids['valids'][$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
						
						$_SESSION[$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
						$errorAndValids['valids'][$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
					}
				}
				
				// Date of birth year
				if (isset($fieldValues[$authoriseAckDOBYearIdentifier]))
				{
					if (strlen($fieldValues[$authoriseAckDOBYearIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$authoriseAckDOBYearIdentifier] = 'Date of birth year must not be empty.';
					} elseif (strlen($fieldValues[$authoriseAckDOBYearIdentifier]) != 4) { 
						$errorAndValids['errors'][$authoriseAckDOBYearIdentifier] = 'Date of birth year must be 4 digits.';
					} else {
						$_SESSION[$authoriseAckDOBYearIdentifier] = $fieldValues[$authoriseAckDOBYearIdentifier];
						$errorAndValids['valids'][$authoriseAckDOBYearIdentifier] = $fieldValues[$authoriseAckDOBYearIdentifier];
					}
				}
				
				// Driver Licence
				if (isset($fieldValues[$authoriseAckLicenceIdentifier]))
				{
					if (strlen($fieldValues[$authoriseAckLicenceIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$authoriseAckLicenceIdentifier] = 'Driver Licence must not be empty.';
					} elseif (strlen($fieldValues[$authoriseAckLicenceIdentifier]) > 20) { 
						$errorAndValids['errors'][$authoriseAckLicenceIdentifier] = 'Driver Licence must be 20 characters or less.';
					} else {
						$_SESSION[$authoriseAckLicenceIdentifier] = $fieldValues[$authoriseAckLicenceIdentifier];
						$errorAndValids['valids'][$authoriseAckLicenceIdentifier] = $fieldValues[$authoriseAckLicenceIdentifier];
					}
				}
				
				// Signature, must be the same as the full name provided
				if (isset($fieldValues[$authoriseAckSignatureIdentifier]))
				{
					if (strlen($fieldValues[$authoriseAckSignatureIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$authoriseAckSignatureIdentifier] = 'Signature name must not be empty.';
					} elseif ($fieldValues[$authoriseAckSignatureIdentifier] != $fieldValues[$authoriseAckNameIdentifier]) { 
						$errorAndValids['errors'][$authoriseAckSignatureIdentifier] = 'Signature name must be the same as Full Name provided above.';
					} else {
						$_SESSION[$authoriseAckSignatureIdentifier] = $fieldValues[$authoriseAckSignatureIdentifier];
						$errorAndValids['valids'][$authoriseAckSignatureIdentifier] = $fieldValues[$authoriseAckSignatureIdentifier];
					}
				}
				
			
			}
			
			
		} else {
			
			$errorAndValids['errors']['numberOfPartners'] = 'You have not filled out the business partners. Please go back to page 3 (Partners) and complete that form.';
		}
		
		return $errorAndValids;
	}
	
	private function validatePage7($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		
		if (isset($_SESSION['numberOfPartners']))
		{
			$errorAndValids['valids']['numberOfPartners'] = $_SESSION['numberOfPartners'];
			$numberPartners = (int)$_SESSION['numberOfPartners'];
			
			for ($i = 1; $i <= $numberPartners; $i++)
			{
				$acceptNameIdentifier = 'acceptanceName'.$i;
				$acceptSignatureIdentifier = 'acceptanceSignature'.$i;
			
				// Business partner name 1
				if (isset($fieldValues[$acceptNameIdentifier]))
				{
					if (strlen($fieldValues[$acceptNameIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$acceptNameIdentifier] = 'Business partner name must not be empty.';
					} elseif (strlen($fieldValues[$acceptNameIdentifier]) > 40) { 
						$errorAndValids['errors'][$acceptNameIdentifier] = 'Business partner name must be 40 characters or less.';
					} else {
						$_SESSION[$acceptNameIdentifier] = $fieldValues[$acceptNameIdentifier];
						$errorAndValids['valids'][$acceptNameIdentifier] = $fieldValues[$acceptNameIdentifier];
					}
				}
				
				// Signature, must be the same as the full name provided
				if (isset($fieldValues[$acceptSignatureIdentifier]))
				{
					if (strlen($fieldValues[$acceptSignatureIdentifier]) == 0 )
					{
						$errorAndValids['errors'][$acceptSignatureIdentifier] = 'Signature name must not be empty.';
					} elseif ($fieldValues[$acceptSignatureIdentifier] != $fieldValues[$acceptNameIdentifier]) { 
						$errorAndValids['errors'][$acceptSignatureIdentifier] = 'Signature name must be the same as Full Name provided above.';
					} else {
						$_SESSION[$acceptSignatureIdentifier] = $fieldValues[$acceptSignatureIdentifier];
						$errorAndValids['valids'][$acceptSignatureIdentifier] = $fieldValues[$acceptSignatureIdentifier];
					}
				}
			}
			
			
		} else {
			
			$errorAndValids['errors']['numberOfPartners'] = 'You have not filled out the business partners. Please go back to page 3 (Partners) and complete that form.';
		}
		
		return $errorAndValids;
	}

}

?>