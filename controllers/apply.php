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
						$this->template = 'apply-4';
					}
				break;
				
				case '4':
					$errorAndValids = $this->validatePage3($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 1)
					{
						$this->template = 'apply-4';
					} else {
						// move on to next page
						$this->template = 'apply-5';
					}
				break;
				
				case '5':
					$errorAndValids = $this->validatePage4($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 1)
					{
						$this->template = 'apply-5';
					} else {
						// move on to next page
						$this->template = 'apply-6';
					}
				break;
				
				case '6':
					$this->template = 'apply-6';
				break;
				
				case '7':
					$this->template = 'apply-7';
				break;
				
				case '8':
					$this->template = 'apply-8';
				break;
				
				case '9':
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
		
		if (isset($fieldValues['numberOfCardholders']))
		{
			$errorAndValids['valids']['numberOfCardholders'] = $fieldValues['numberOfCardholders'];
			$numberCardholders = (int)$fieldValues['numberOfCardholders'];
			$_SESSION['numberOfCardholders'] = $numberCardholders;

			$cardHolderNameIdentifier = 'cardHolderName';
			$cardHolderRegistrationIdentifier = 'registrationNo';
			$cardHolderAllProductsIdentifier = 'allFuelCardProducts';
			$cardHolderProductsIdentifier = 'fuelCardProducts';
			
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
		}	

	
		return $errorAndValids;
	}

}

?>