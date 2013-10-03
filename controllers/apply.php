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
	
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($getVars['page']))
		{
			switch ($getVars['page'])
			{	
				case '2':
					$errorAndValids = $this->validatePage1($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage2($getVars);
						$this->template = 'apply-3';
						break;
					} else {
						$this->template = 'apply-2';
						break;
					}
				
				case '3':
					$errorAndValids = $this->validatePage2($getVars);
					
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage3($getVars);
						$this->template = 'apply-4';
						break;
					} else {
						$this->template = 'apply-3';
						break;
					}
					
				case '4':
					$errorAndValids = $this->validatePage3($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage4($getVars);
						$this->template = 'apply-5';
						break;
					} else {
						$this->template = 'apply-4';
						break;
					}
					
				case '5':
					$errorAndValids = $this->validatePage4($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage5($getVars);
						$this->template = 'apply-6';
						break;
					} else {
						$this->template = 'apply-5';
						break;
					}
				
				case '6':
					$errorAndValids = $this->validatePage5($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage6($getVars);
						$this->template = 'apply-7';
						break;
					} else {
						$this->template = 'apply-6';
						break;
					}
				
				case '7':
					$errorAndValids = $this->validatePage6($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$errorAndValids = $this->validatePage7($getVars);
						$this->template = 'apply-8';
						break;
					} else {
						$this->template = 'apply-7';
						break;
					}
				
				case '8':
					$errorAndValids = $this->validatePage7($getVars);
					if (isset($getVars['navigation']) && $getVars['navigation'] == 'next' && count($errorAndValids['errors']) == 0)
					{
						$completedForm = $this->getCompletedFormArray();
						$this->template = 'apply-9';
						break;
					} else {
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
		
		//If we are going to very first page, clear session variables to begin
		if ($this->template == 'apply')
		{
			session_start();
			session_unset();
			session_destroy();
			session_write_close();
			setcookie(session_name(),'',0,'/');
			session_regenerate_id(true);
			
			$header = new View_Model('header');
			$footer = new View_Model('footer');
		} else {
			$header = new View_Model('header-application');
			$footer = new View_Model('footer-application');
		}
		
		
		$header->assign('active_nav','apply');
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		
		//assign the errors array to the template data
		$view->assign('errors', $errorAndValids['errors']);
		$view->assign('valids', $errorAndValids['valids']);
		
		if ($this->template == 'apply-9')
		{
			$view->assign('completedPages', $completedForm);
		}
		
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
		if (isset($_SESSION['biztype']) && !isset($errorAndValids['errors']['biztype']))
		{
			$errorAndValids['valids']['biztype'] = $_SESSION['biztype'];
		} elseif (isset($_SESSION['biztype'])) {
			unset($_SESSION['biztype']);
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
		if (isset($_SESSION['businessName']) && !isset($errorAndValids['errors']['businessName']))
		{
			$errorAndValids['valids']['businessName'] = $_SESSION['businessName'];
		} elseif (isset($_SESSION['businessName'])) {
			unset($_SESSION['businessName']);
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
		if (isset($_SESSION['tradingName']) && !isset($errorAndValids['errors']['tradingName']))
		{
			$errorAndValids['valids']['tradingName'] = $_SESSION['tradingName'];
		} elseif (isset($_SESSION['tradingName'])) {
			unset($_SESSION['tradingName']);
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
		if (isset($_SESSION['yearBizStart']) && !isset($errorAndValids['errors']['yearBizStart']))
		{
			$errorAndValids['valids']['yearBizStart'] = $_SESSION['yearBizStart'];
		} elseif (isset($_SESSION['yearBizStart'])) {
			unset($_SESSION['yearBizStart']);
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
		if (isset($_SESSION['abn']) && !isset($errorAndValids['errors']['abn']))
		{
			$errorAndValids['valids']['abn'] = $_SESSION['abn'];
		} elseif (isset($_SESSION['abn'])) {
			unset($_SESSION['abn']);
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
		if (isset($_SESSION['operations']) && !isset($errorAndValids['errors']['operations']))
		{
			$errorAndValids['valids']['operations'] = $_SESSION['operations'];
		} elseif (isset($_SESSION['operations'])) {
			unset($_SESSION['operations']);
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
		if (isset($_SESSION['contactFirstName']) && !isset($errorAndValids['errors']['contactFirstName']))
		{
			$errorAndValids['valids']['contactFirstName'] = $_SESSION['contactFirstName'];
		} elseif (isset($_SESSION['contactFirstName'])) {
			unset($_SESSION['contactFirstName']);
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
		if (isset($_SESSION['contactLastName']) && !isset($errorAndValids['errors']['contactLastName']))
		{
			$errorAndValids['valids']['contactLastName'] = $_SESSION['contactLastName'];
		} elseif (isset($_SESSION['contactLastName'])) {
			unset($_SESSION['contactLastName']);
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
		if (isset($_SESSION['inputPosition']) && !isset($errorAndValids['errors']['inputPosition']))
		{
			$errorAndValids['valids']['inputPosition'] = $_SESSION['inputPosition'];
		} elseif (isset($_SESSION['inputPosition'])) {
			unset($_SESSION['inputPosition']);
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
		if (isset($_SESSION['inputPhone']) && !isset($errorAndValids['errors']['inputPhone']))
		{
			$errorAndValids['valids']['inputPhone'] = $_SESSION['inputPhone'];
		} elseif (isset($_SESSION['inputPhone'])) {
			unset($_SESSION['inputPhone']);
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
		if (isset($_SESSION['inputFax']) && !isset($errorAndValids['errors']['inputFax']))
		{
			$errorAndValids['valids']['inputFax'] = $_SESSION['inputFax'];
		} elseif (isset($_SESSION['inputFax'])) {
			unset($_SESSION['inputFax']);
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
		if (isset($_SESSION['inputMobile']) && !isset($errorAndValids['errors']['inputMobile']))
		{
			$errorAndValids['valids']['inputMobile'] = $_SESSION['inputMobile'];
		} elseif (isset($_SESSION['inputMobile'])) {
			unset($_SESSION['inputMobile']);
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
		if (isset($_SESSION['inputEmail1']) && !isset($errorAndValids['errors']['inputEmail1']))
		{
			$errorAndValids['valids']['inputEmail1'] = $_SESSION['inputEmail1'];
		} elseif (isset($_SESSION['inputEmail1'])) {
			unset($_SESSION['inputEmail1']);
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
		if (isset($_SESSION['creditLimit']) && !isset($errorAndValids['errors']['creditLimit']))
		{
			$errorAndValids['valids']['creditLimit'] = $_SESSION['creditLimit'];
		} elseif (isset($_SESSION['creditLimit'])) {
			unset($_SESSION['creditLimit']);
		}
		
		
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page1valid'] = true;
		} else {
			 $_SESSION['page1valid'] = false;
		}
		
		
		return $errorAndValids;
	}
	
	
	private function validatePage2($fieldValues)
	{
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
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
		if (isset($_SESSION['refName1']) && !isset($errorAndValids['errors']['refName1']))
		{
			$errorAndValids['valids']['refName1'] = $_SESSION['refName1'];
		} elseif (isset($_SESSION['refName1'])) {
			unset($_SESSION['refName1']);
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
		if (isset($_SESSION['refPhone1']) && !isset($errorAndValids['errors']['refPhone1']))
		{
			$errorAndValids['valids']['refPhone1'] = $_SESSION['refPhone1'];
		} elseif (isset($_SESSION['refPhone1'])) {
			unset($_SESSION['refPhone1']);
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
		if (isset($_SESSION['refName2']) && !isset($errorAndValids['errors']['refName2']))
		{
			$errorAndValids['valids']['refName2'] = $_SESSION['refName2'];
		} elseif (isset($_SESSION['refName2'])) {
			unset($_SESSION['refName2']);
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
		if (isset($_SESSION['refPhone2']) && !isset($errorAndValids['errors']['refPhone2']))
		{
			$errorAndValids['valids']['refPhone2'] = $_SESSION['refPhone2'];
		} elseif (isset($_SESSION['refPhone2'])) {
			unset($_SESSION['refPhone2']);
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
		if (isset($_SESSION['fuelSupplierName']) && !isset($errorAndValids['errors']['fuelSupplierName']))
		{
			$errorAndValids['valids']['fuelSupplierName'] = $_SESSION['fuelSupplierName'];
		} elseif (isset($_SESSION['fuelSupplierName'])) {
			unset($_SESSION['fuelSupplierName']);
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
		if (isset($_SESSION['fuelSupplierPhone']) && !isset($errorAndValids['errors']['fuelSupplierPhone']))
		{
			$errorAndValids['valids']['fuelSupplierPhone'] = $_SESSION['fuelSupplierPhone'];
		} elseif (isset($_SESSION['fuelSupplierPhone'])) {
			unset($_SESSION['fuelSupplierPhone']);
		}
		
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page2valid'] = true;
		} else {
			 $_SESSION['page2valid'] = false;
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
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
		$errorAndValids = array('errors' => array(), 'valids' => array());

		if (isset($fieldValues['numberOfPartners']) || isset($_SESSION['numberOfPartners']))
		{
			if (isset($fieldValues['numberOfPartners']))
			{
				$errorAndValids['valids']['numberOfPartners'] = $fieldValues['numberOfPartners'];
				$numberPartners = (int)$fieldValues['numberOfPartners'];
				$_SESSION['numberOfPartners'] = $numberPartners;
			} else {
				$errorAndValids['valids']['numberOfPartners'] = $_SESSION['numberOfPartners'];
				$numberPartners = (int)$_SESSION['numberOfPartners'];
			}
			
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
				if (isset($_SESSION[$partnerNameIdentifier.$i]) && !isset($errorAndValids['errors'][$partnerNameIdentifier.$i]))
				{
					$errorAndValids['valids'][$partnerNameIdentifier.$i] = $_SESSION[$partnerNameIdentifier.$i];
				} elseif (isset($_SESSION[$partnerNameIdentifier.$i])) {
					unset($_SESSION[$partnerNameIdentifier.$i]);
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
				if (isset($_SESSION[$partnerPhoneIdentifier.$i]) && !isset($errorAndValids['errors'][$partnerPhoneIdentifier.$i]))
				{
					$errorAndValids['valids'][$partnerPhoneIdentifier.$i] = $_SESSION[$partnerPhoneIdentifier.$i];
				} elseif (isset($_SESSION[$partnerPhoneIdentifier.$i])) {
					unset($_SESSION[$partnerPhoneIdentifier.$i]);
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
				if (isset($_SESSION[$partnerAddressIdentifier.$i]) && !isset($errorAndValids['errors'][$partnerAddressIdentifier.$i]))
				{
					$errorAndValids['valids'][$partnerAddressIdentifier.$i] = $_SESSION[$partnerAddressIdentifier.$i];
				} elseif (isset($_SESSION[$partnerAddressIdentifier.$i])) {
					unset($_SESSION[$partnerAddressIdentifier.$i]);
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
				if (isset($_SESSION[$partnerStateIdentifier.$i]) && !isset($errorAndValids['errors'][$partnerStateIdentifier.$i]))
				{
					$errorAndValids['valids'][$partnerStateIdentifier.$i] = $_SESSION[$partnerStateIdentifier.$i];
				} elseif (isset($_SESSION[$partnerStateIdentifier.$i])) {
					unset($_SESSION[$partnerStateIdentifier.$i]);
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
				if (isset($_SESSION[$partnerPostcodeIdentifier.$i]) && !isset($errorAndValids['errors'][$partnerPostcodeIdentifier.$i]))
				{
					$errorAndValids['valids'][$partnerPostcodeIdentifier.$i] = $_SESSION[$partnerPostcodeIdentifier.$i];
				} elseif (isset($_SESSION[$partnerPostcodeIdentifier.$i])) {
					unset($_SESSION[$partnerPostcodeIdentifier.$i]);
				}
			
			}
		} else {
			$errorAndValids['valids']['numberOfPartners'] = 1;
		}
		
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page3valid'] = true;
		} else {
			 $_SESSION['page3valid'] = false;
		}
		
		return $errorAndValids;
	}
	
	
	private function validatePage4($fieldValues)
	{
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		//have to check for trading name
		if (isset($fieldValues['tradingNameFuelCard']))
		{
			if (strlen($fieldValues['tradingNameFuelCard']) == 0 )
			{
				$errorAndValids['errors']['tradingNameFuelCard'] = 'Trading name must not be empty.';
			} elseif (strlen($fieldValues['tradingNameFuelCard']) > 40) { 
				$errorAndValids['errors']['tradingNameFuelCard'] = 'Trading name must be 40 characters or less.';
			} else {
				$_SESSION['tradingNameFuelCard'] = $fieldValues['tradingNameFuelCard'];
				$errorAndValids['valids']['tradingNameFuelCard'] = $fieldValues['tradingNameFuelCard'];
			}
		}
		if (isset($_SESSION['tradingNameFuelCard']) && !isset($errorAndValids['errors']['tradingNameFuelCard']))
		{
			$errorAndValids['valids']['tradingNameFuelCard'] = $_SESSION['tradingNameFuelCard'];
		} elseif (isset($_SESSION['tradingNameFuelCard'])) {
			unset($_SESSION['tradingNameFuelCard']);
		}
		
		$cardHolderNameIdentifier = 'cardHolderName';
		$cardHolderRegistrationIdentifier = 'registrationNo';
		$cardHolderAllProductsIdentifier = 'allFuelCardProducts';
		$cardHolderProductsIdentifier = 'fuelCardProducts';
		$cardHolderPinRequiredIdentifier = 'pinRequired';
		
		if (isset($fieldValues['numberOfCardholders']) || isset($_SESSION['numberOfCardholders']))
		{
			if (isset($fieldValues['numberOfCardholders']))
			{
				$errorAndValids['valids']['numberOfCardholders'] = $fieldValues['numberOfCardholders'];
				$numberCardholders = (int)$fieldValues['numberOfCardholders'];
				$_SESSION['numberOfCardholders'] = $numberCardholders;
			} else {
				$errorAndValids['valids']['numberOfCardholders'] = $_SESSION['numberOfCardholders'];
				$numberCardholders = (int)$_SESSION['numberOfCardholders'];
			}

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
				if (isset($_SESSION[$cardHolderNameIdentifier.$i]) && !isset($errorAndValids['errors'][$cardHolderNameIdentifier.$i]))
				{
					$errorAndValids['valids'][$cardHolderNameIdentifier.$i] = $_SESSION[$cardHolderNameIdentifier.$i];
				} elseif (isset($_SESSION[$cardHolderNameIdentifier.$i])) {
					unset($_SESSION[$cardHolderNameIdentifier.$i]);
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
				if (isset($_SESSION[$cardHolderRegistrationIdentifier.$i]) && !isset($errorAndValids['errors'][$cardHolderRegistrationIdentifier.$i]))
				{
					$errorAndValids['valids'][$cardHolderRegistrationIdentifier.$i] = $_SESSION[$cardHolderRegistrationIdentifier.$i];
				} elseif (isset($_SESSION[$cardHolderRegistrationIdentifier.$i])) {
					unset($_SESSION[$cardHolderRegistrationIdentifier.$i]);
				}
				
				// Pin required select box
				if (isset($fieldValues[$cardHolderPinRequiredIdentifier.$i]))
				{
					$_SESSION[$cardHolderPinRequiredIdentifier.$i] = $fieldValues[$cardHolderPinRequiredIdentifier.$i];
					$errorAndValids['valids'][$cardHolderPinRequiredIdentifier.$i] = $fieldValues[$cardHolderPinRequiredIdentifier.$i];
				}
				if (isset($_SESSION[$cardHolderPinRequiredIdentifier.$i]))
				{
					$errorAndValids['valids'][$cardHolderPinRequiredIdentifier.$i] = $_SESSION[$cardHolderPinRequiredIdentifier.$i];
				}
				
				// Checked products, initially create array for all product options as false for unselected
				if (isset($fieldValues[$cardHolderProductsIdentifier.$i]))
				{
					if (count($fieldValues[$cardHolderProductsIdentifier.$i]) == 0 )
					{
						$errorAndValids['errors'][$cardHolderProductsIdentifier.$i] = 'Must select at least one product for fuel card.';
					} elseif (isset($fieldValues[$cardHolderProductsIdentifier.$i])) {
						$errorAndValids['valids'][$cardHolderProductsIdentifier.$i] = array( "unleaded" => false, "biodiesel" => false, "unleadedMax" => false, "lpg" => false, "gas" => false, "carWash" => false, "shop" => false, "premiumUnleaded" => false, "octane" => false );
						// add for each selected item to be set to true in the array of all product options
						foreach ($fieldValues[$cardHolderProductsIdentifier.$i] as $selectedProductVal)
						{
							$errorAndValids['valids'][$cardHolderProductsIdentifier.$i][$selectedProductVal] = true;
						}
						$_SESSION[$cardHolderProductsIdentifier.$i] = $errorAndValids['valids'][$cardHolderProductsIdentifier.$i];
					}
					
				} elseif (!isset($_SESSION[$cardHolderProductsIdentifier.$i])) {
					$errorAndValids['errors'][$cardHolderProductsIdentifier.$i] = 'Must select at least one product for fuel card.';
				}
				
				if (isset($_SESSION[$cardHolderProductsIdentifier.$i]) && !isset($errorAndValids['errors'][$cardHolderProductsIdentifier.$i]))
				{
					$errorAndValids['valids'][$cardHolderProductsIdentifier.$i] = $_SESSION[$cardHolderProductsIdentifier.$i];
				} 
			}
			
		} else {
			$errorAndValids['valids']['numberOfCardholders'] = 1;
			// have to setup array of fuel card options 
			$errorAndValids['valids'][$cardHolderProductsIdentifier.'1'] = array( "unleaded" => false, "biodiesel" => false, "unleadedMax" => false, "lpg" => false, "gas" => false, "carWash" => false, "shop" => false, "premiumUnleaded" => false, "octane" => false );
		}	
		
		
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page4valid'] = true;
		} else {
			 $_SESSION['page4valid'] = false;
		}
	
		return $errorAndValids;
	}
	
	private function validatePage5($fieldValues)
	{
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($fieldValues['paymentType']) || isset($_SESSION['paymentType']))
		{
			if (isset($fieldValues['paymentType']) && $fieldValues['paymentType'] == 'select')
			{
				$errorAndValids['errors']['paymentType'] = 'Must select and complete a payment option.';
			} else {
				if (isset($fieldValues['paymentType']) && $fieldValues['paymentType'] != 'select')
				{
					$_SESSION['paymentType'] = $fieldValues['paymentType'];
					$errorAndValids['valids']['paymentType'] = $fieldValues['paymentType'];
				}
				
				if ((isset($fieldValues['paymentType']) && $fieldValues['paymentType'] == 'directDebit') || (isset($_SESSION['paymentType']) && $_SESSION['paymentType'] == 'directDebit'))
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
					if (isset($_SESSION[$directDebitAuthorizeIdentifier]) && !isset($errorAndValids['errors'][$directDebitAuthorizeIdentifier]))
					{
						$errorAndValids['valids'][$directDebitAuthorizeIdentifier] = $_SESSION[$directDebitAuthorizeIdentifier];
					} elseif (isset($_SESSION[$directDebitAuthorizeIdentifier])) {
						unset($_SESSION[$directDebitAuthorizeIdentifier]);
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
					if (isset($_SESSION[$directDebitAccountTypeIdentifier]) && !isset($errorAndValids['errors'][$directDebitAccountTypeIdentifier]))
					{
						$errorAndValids['valids'][$directDebitAccountTypeIdentifier] = $_SESSION[$directDebitAccountTypeIdentifier];
					} elseif (isset($_SESSION[$directDebitAccountTypeIdentifier])) {
						unset($_SESSION[$directDebitAccountTypeIdentifier]);
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
					if (isset($_SESSION[$directDebitBankNameIdentifier]) && !isset($errorAndValids['errors'][$directDebitBankNameIdentifier]))
					{
						$errorAndValids['valids'][$directDebitBankNameIdentifier] = $_SESSION[$directDebitBankNameIdentifier];
					} elseif (isset($_SESSION[$directDebitBankNameIdentifier])) {
						unset($_SESSION[$directDebitBankNameIdentifier]);
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
					if (isset($_SESSION[$directDebitAccountNameIdentifier]) && !isset($errorAndValids['errors'][$directDebitAccountNameIdentifier]))
					{
						$errorAndValids['valids'][$directDebitAccountNameIdentifier] = $_SESSION[$directDebitAccountNameIdentifier];
					} elseif (isset($_SESSION[$directDebitAccountNameIdentifier])) {
						unset($_SESSION[$directDebitAccountNameIdentifier]);
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
					if (isset($_SESSION[$directDebitBSBIdentifier]) && !isset($errorAndValids['errors'][$directDebitBSBIdentifier]))
					{
						$errorAndValids['valids'][$directDebitBSBIdentifier] = $_SESSION[$directDebitBSBIdentifier];
					} elseif (isset($_SESSION[$directDebitBSBIdentifier])) {
						unset($_SESSION[$directDebitBSBIdentifier]);
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
					if (isset($_SESSION[$directDebitAccountNumberIdentifier]) && !isset($errorAndValids['errors'][$directDebitAccountNumberIdentifier]))
					{
						$errorAndValids['valids'][$directDebitAccountNumberIdentifier] = $_SESSION[$directDebitAccountNumberIdentifier];
					} elseif (isset($_SESSION[$directDebitAccountNumberIdentifier])) {
						unset($_SESSION[$directDebitAccountNumberIdentifier]);
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
					if (isset($_SESSION[$directDebitAcknowledgeIdentifier]) && !isset($errorAndValids['errors'][$directDebitAcknowledgeIdentifier]))
					{
						$errorAndValids['valids'][$directDebitAcknowledgeIdentifier] = $_SESSION[$directDebitAcknowledgeIdentifier];
					} elseif (isset($_SESSION[$directDebitAcknowledgeIdentifier])) {
						unset($_SESSION[$directDebitAcknowledgeIdentifier]);
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
					if (isset($_SESSION[$creditCardAuthorizeIdentifier]) && !isset($errorAndValids['errors'][$creditCardAuthorizeIdentifier]))
					{
						$errorAndValids['valids'][$creditCardAuthorizeIdentifier] = $_SESSION[$creditCardAuthorizeIdentifier];
					} elseif (isset($_SESSION[$creditCardAuthorizeIdentifier])) {
						unset($_SESSION[$creditCardAuthorizeIdentifier]);
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
					if (isset($_SESSION[$creditCardPaymentDateIdentifier]) && !isset($errorAndValids['errors'][$creditCardPaymentDateIdentifier]))
					{
						$errorAndValids['valids'][$creditCardPaymentDateIdentifier] = $_SESSION[$creditCardPaymentDateIdentifier];
					} elseif (isset($_SESSION[$creditCardPaymentDateIdentifier])) {
						unset($_SESSION[$creditCardPaymentDateIdentifier]);
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
					if (isset($_SESSION[$creditCardNameIdentifier]) && !isset($errorAndValids['errors'][$creditCardNameIdentifier]))
					{
						$errorAndValids['valids'][$creditCardNameIdentifier] = $_SESSION[$creditCardNameIdentifier];
					} elseif (isset($_SESSION[$creditCardNameIdentifier])) {
						unset($_SESSION[$creditCardNameIdentifier]);
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
					if (isset($_SESSION[$creditCardNumberIdentifier]) && !isset($errorAndValids['errors'][$creditCardNumberIdentifier]))
					{
						$errorAndValids['valids'][$creditCardNumberIdentifier] = $_SESSION[$creditCardNumberIdentifier];
					} elseif (isset($_SESSION[$creditCardNumberIdentifier])) {
						unset($_SESSION[$creditCardNumberIdentifier]);
					}
					
					//Expiry Date Month
					if (isset($fieldValues[$creditCardExpiryMonthIdentifier]))
					{
						if ($fieldValues[$creditCardExpiryMonthIdentifier] == 'select')
						{
							$errorAndValids['errors'][$creditCardExpiryDateIdentifier] = 'You must select an expiry date.';
						} else {
							$_SESSION[$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
							$errorAndValids['valids'][$creditCardExpiryMonthIdentifier] = $fieldValues[$creditCardExpiryMonthIdentifier];
						}
					}
					if (isset($_SESSION[$creditCardExpiryMonthIdentifier]) && !(isset($fieldValues[$creditCardExpiryMonthIdentifier]) && $fieldValues[$creditCardExpiryMonthIdentifier] == 'select'))
					{
						$errorAndValids['valids'][$creditCardExpiryMonthIdentifier] = $_SESSION[$creditCardExpiryMonthIdentifier];
					} elseif (isset($_SESSION[$creditCardExpiryMonthIdentifier])) {
						unset($_SESSION[$creditCardExpiryMonthIdentifier]);
					}
					
					//Expiry Date Year
					if (isset($fieldValues[$creditCardExpiryYearIdentifier]))
					{
						if ($fieldValues[$creditCardExpiryYearIdentifier] == 'select')
						{
							$errorAndValids['errors'][$creditCardExpiryDateIdentifier] = 'You must select an expiry date.';
						} else {
							$_SESSION[$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
							$errorAndValids['valids'][$creditCardExpiryYearIdentifier] = $fieldValues[$creditCardExpiryYearIdentifier];
						}
					}
					if (isset($_SESSION[$creditCardExpiryYearIdentifier]) && !(isset($fieldValues[$creditCardExpiryYearIdentifier]) && $fieldValues[$creditCardExpiryYearIdentifier] == 'select'))
					{
						$errorAndValids['valids'][$creditCardExpiryYearIdentifier] = $_SESSION[$creditCardExpiryYearIdentifier];
					} elseif (isset($_SESSION[$creditCardExpiryYearIdentifier])) {
						unset($_SESSION[$creditCardExpiryYearIdentifier]);
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
					if (isset($_SESSION[$creditCardTypeIdentifier]) && !isset($errorAndValids['errors'][$creditCardTypeIdentifier]))
					{
						$errorAndValids['valids'][$creditCardTypeIdentifier] = $_SESSION[$creditCardTypeIdentifier];
					} elseif (isset($_SESSION[$creditCardTypeIdentifier])) {
						unset($_SESSION[$creditCardTypeIdentifier]);
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
					if (isset($_SESSION[$creditCardAcknowledgeIdentifier]) && !isset($errorAndValids['errors'][$creditCardAcknowledgeIdentifier]))
					{
						$errorAndValids['valids'][$creditCardAcknowledgeIdentifier] = $_SESSION[$creditCardAcknowledgeIdentifier];
					} elseif (isset($_SESSION[$creditCardAcknowledgeIdentifier])) {
						unset($_SESSION[$creditCardAcknowledgeIdentifier]);
					}
					
				}
			}
		}
		if (isset($_SESSION['paymentType']) && !isset($errorAndValids['errors']['paymentType']))
		{
			$errorAndValids['valids']['paymentType'] = $_SESSION['paymentType'];
		} elseif (isset($_SESSION['paymentType'])) {
			unset($_SESSION['paymentType']);
		}
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page5valid'] = true;
		} else {
			 $_SESSION['page5valid'] = false;
		}
		
		return $errorAndValids;
	}
	
	private function validatePage6($fieldValues)
	{
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
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
				if (isset($_SESSION[$authoriseAckNameIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckNameIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckNameIdentifier] = $_SESSION[$authoriseAckNameIdentifier];
				} elseif (isset($_SESSION[$authoriseAckNameIdentifier])) {
					unset($_SESSION[$authoriseAckNameIdentifier]);
				}
				
				// Date of Birth Day
				if (isset($fieldValues[$authoriseAckDOBDayIdentifier]))
				{
					if ($fieldValues[$authoriseAckDOBDayIdentifier] == 'select')
					{
						$errorAndValids['errors'][$authoriseAckDOBIdentifier] = 'You must select a date of birth day and month.';
					} else {
						$_SESSION[$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
						$errorAndValids['valids'][$authoriseAckDOBDayIdentifier] = $fieldValues[$authoriseAckDOBDayIdentifier];
					}
				}
				if (isset($_SESSION[$authoriseAckDOBDayIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckDOBDayIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckDOBDayIdentifier] = $_SESSION[$authoriseAckDOBDayIdentifier];
				} elseif (isset($_SESSION[$authoriseAckDOBDayIdentifier])) {
					unset($_SESSION[$authoriseAckDOBDayIdentifier]);
				}
				
				// Date of Birth Month
				if (isset($fieldValues[$authoriseAckDOBMonthIdentifier]))
				{
					if ($fieldValues[$authoriseAckDOBMonthIdentifier] == 'select')
					{
						$errorAndValids['errors'][$authoriseAckDOBIdentifier] = 'You must select a date of birth day and month.';
					} else {
						$_SESSION[$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
						$errorAndValids['valids'][$authoriseAckDOBMonthIdentifier] = $fieldValues[$authoriseAckDOBMonthIdentifier];
					}
				}
				if (isset($_SESSION[$authoriseAckDOBMonthIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckDOBMonthIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckDOBMonthIdentifier] = $_SESSION[$authoriseAckDOBMonthIdentifier];
				} elseif (isset($_SESSION[$authoriseAckDOBMonthIdentifier])) {
					unset($_SESSION[$authoriseAckDOBMonthIdentifier]);
				}
				
				/*
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
				*/
				
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
				if (isset($_SESSION[$authoriseAckDOBYearIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckDOBYearIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckDOBYearIdentifier] = $_SESSION[$authoriseAckDOBYearIdentifier];
				} elseif (isset($_SESSION[$authoriseAckDOBYearIdentifier])) {
					unset($_SESSION[$authoriseAckDOBYearIdentifier]);
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
				if (isset($_SESSION[$authoriseAckLicenceIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckLicenceIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckLicenceIdentifier] = $_SESSION[$authoriseAckLicenceIdentifier];
				} elseif (isset($_SESSION[$authoriseAckLicenceIdentifier])) {
					unset($_SESSION[$authoriseAckLicenceIdentifier]);
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
				if (isset($_SESSION[$authoriseAckSignatureIdentifier]) && !isset($errorAndValids['errors'][$authoriseAckSignatureIdentifier]))
				{
					$errorAndValids['valids'][$authoriseAckSignatureIdentifier] = $_SESSION[$authoriseAckSignatureIdentifier];
				} elseif (isset($_SESSION[$authoriseAckSignatureIdentifier])) {
					unset($_SESSION[$authoriseAckSignatureIdentifier]);
				}
			}
		} else {
			$errorAndValids['errors']['numberOfPartners'] = 'You have not filled out the business partners. Please go back to page 3 (Partners) and complete that form.';
		}
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page6valid'] = true;
		} else {
			 $_SESSION['page6valid'] = false;
		}
		
		return $errorAndValids;
	}
	
	private function validatePage7($fieldValues)
	{
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		
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
				if (isset($_SESSION[$acceptNameIdentifier]) && !isset($errorAndValids['errors'][$acceptNameIdentifier]))
				{
					$errorAndValids['valids'][$acceptNameIdentifier] = $_SESSION[$acceptNameIdentifier];
				} elseif (isset($_SESSION[$acceptNameIdentifier])) {
					unset($_SESSION[$acceptNameIdentifier]);
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
				if (isset($_SESSION[$acceptSignatureIdentifier]) && !isset($errorAndValids['errors'][$acceptSignatureIdentifier]))
				{
					$errorAndValids['valids'][$acceptSignatureIdentifier] = $_SESSION[$acceptSignatureIdentifier];
				} elseif (isset($_SESSION[$acceptSignatureIdentifier])) {
					unset($_SESSION[$acceptSignatureIdentifier]);
				}
			}
			
			
		} else {
			
			$errorAndValids['errors']['numberOfPartners'] = 'You have not filled out the business partners. Please go back to page 3 (Partners) and complete that form.';
		}
		
		if (count($errorAndValids['errors']) == 0)
		{
			 $_SESSION['page7valid'] = true;
		} else {
			 $_SESSION['page7valid'] = false;
		}
		
		return $errorAndValids;
	}
	
	private function getCompletedFormArray()
	{
		$completedPages = array();
		
		//Page 1
		$completedPages['page1'] = array();
		
		if (isset($_SESSION['biztype']))
			$completedPages['page1']['biztype'] = $_SESSION['biztype'];
		if (isset($_SESSION['businessName']))
			$completedPages['page1']['businessName'] = $_SESSION['businessName'];	
		if (isset($_SESSION['tradingName']))
			$completedPages['page1']['tradingName'] = $_SESSION['tradingName'];
		if (isset($_SESSION['yearBizStart']))
			$completedPages['page1']['yearBizStart'] = $_SESSION['yearBizStart'];
		if (isset($_SESSION['abn']))
			$completedPages['page1']['abn'] = $_SESSION['abn'];
		if (isset($_SESSION['operations']))
			$completedPages['page1']['operations'] = $_SESSION['operations'];
		if (isset($_SESSION['contactFirstName']))
			$completedPages['page1']['contactFirstName'] = $_SESSION['contactFirstName'];
		if (isset($_SESSION['contactLastName']))
			$completedPages['page1']['contactLastName'] = $_SESSION['contactLastName'];
		if (isset($_SESSION['inputPosition']))
			$completedPages['page1']['inputPosition'] = $_SESSION['inputPosition'];
		if (isset($_SESSION['inputPhone']))
			$completedPages['page1']['inputPhone'] = $_SESSION['inputPhone'];	
		if (isset($_SESSION['inputFax']))
			$completedPages['page1']['inputFax'] = $_SESSION['inputFax'];		
		if (isset($_SESSION['inputMobile']))
			$completedPages['page1']['inputMobile'] = $_SESSION['inputMobile'];	
		if (isset($_SESSION['inputEmail1']))
			$completedPages['page1']['inputEmail1'] = $_SESSION['inputEmail1'];		
		if (isset($_SESSION['creditLimit']))
			$completedPages['page1']['creditLimit'] = $_SESSION['creditLimit'];		
			
		//Page 2
		$completedPages['page2'] = array();
		
		if (isset($_SESSION['refName1']))
			$completedPages['page2']['refName1'] = $_SESSION['refName1'];
		if (isset($_SESSION['refPhone1']))
			$completedPages['page2']['refPhone1'] = $_SESSION['refPhone1'];	
		if (isset($_SESSION['refName2']))
			$completedPages['page2']['refName2'] = $_SESSION['refName2'];
		if (isset($_SESSION['refPhone2']))
			$completedPages['page2']['refPhone2'] = $_SESSION['refPhone2'];	
		if (isset($_SESSION['fuelSupplierName']))
			$completedPages['page2']['fuelSupplierName'] = $_SESSION['fuelSupplierName'];
		if (isset($_SESSION['fuelSupplierPhone']))
			$completedPages['page2']['fuelSupplierPhone'] = $_SESSION['fuelSupplierPhone'];		
		
		//Page 3
		$completedPages['page3'] = array();
		
		if (isset($_SESSION['numberOfPartners']))
		{
			$completedPages['page3']['numberOfPartners'] = $_SESSION['numberOfPartners'];
			
			$completedPages['page3']['partnerDetails'] = array();
			for ($i = 1; $i <= $completedPages['page3']['numberOfPartners']; $i++)
			{
				$partnerDetails = array();
				if (isset($_SESSION['partnerName'.$i]))
					$partnerDetails['partnerName'] = $_SESSION['partnerName'.$i];
				if (isset($_SESSION['partnerPhone'.$i]))
					$partnerDetails['partnerPhone'] = $_SESSION['partnerPhone'.$i];
				if (isset($_SESSION['partnerAddress'.$i]))
					$partnerDetails['partnerAddress'] = $_SESSION['partnerAddress'.$i];	
				if (isset($_SESSION['partnerState'.$i]))
					$partnerDetails['partnerState'] = $_SESSION['partnerState'.$i];	
				if (isset($_SESSION['partnerPostcode'.$i]))
					$partnerDetails['partnerPostcode'] = $_SESSION['partnerPostcode'.$i];	
					
				$completedPages['page3']['partnerDetails'][] = $partnerDetails;	
			}
		}
		
		//Page 4
		$completedPages['page4'] = array();
		
		if (isset($_SESSION['tradingNameFuelCard']))
			$completedPages['page4']['tradingNameFuelCard'] = $_SESSION['tradingNameFuelCard'];
			
		if (isset($_SESSION['numberOfCardholders']))
		{
			$completedPages['page4']['numberOfCardholders'] = $_SESSION['numberOfCardholders'];
			
			$completedPages['page4']['cardHolderDetails'] = array();
			for ($i = 1; $i <= (int)$completedPages['page4']['numberOfCardholders']; $i++)
			{
				$cardHolderDetails = array();
				if (isset($_SESSION['cardHolderName'.$i]))
					$cardHolderDetails['cardHolderName'] = $_SESSION['cardHolderName'.$i];
				if (isset($_SESSION['registrationNo'.$i]))
					$cardHolderDetails['registrationNo'] = $_SESSION['registrationNo'.$i];
				if (isset($_SESSION['pinRequired'.$i]))
					$cardHolderDetails['pinRequired'] = $_SESSION['pinRequired'.$i];
				$fuelCardProducts = array( "unleaded" => false, "biodiesel" => false, "unleadedMax" => false, "lpg" => false, "gas" => false, "carWash" => false, "shop" => false, "premiumUnleaded" => false, "octane" => false );	
				if (isset($_SESSION['fuelCardProducts'.$i]))
				{
					foreach ($_SESSION['fuelCardProducts'.$i] as $product => $true)
					{
						$fuelCardProducts[$product] = true;
					}
				}
				$cardHolderDetails['fuelCardProducts'] = $fuelCardProducts;
					
				$completedPages['page4']['cardHolderDetails'][] = $cardHolderDetails;	
			}
		}
		
		//Page 5
		$completedPages['page5'] = array();
		
		if (isset($_SESSION['paymentType']))
		{
			$completedPages['page5']['paymentType'] = $_SESSION['paymentType'];
			
			if ($_SESSION['paymentType'] == 'directDebit')
			{	
				if (isset($_SESSION['ddAuthoriseName']))
					$completedPages['page5']['ddAuthoriseName'] = $_SESSION['ddAuthoriseName'];
				if (isset($_SESSION['accountType']))
					$completedPages['page5']['accountType'] = $_SESSION['accountType'];
				if (isset($_SESSION['bankName']))
					$completedPages['page5']['bankName'] = $_SESSION['bankName'];	
				if (isset($_SESSION['accountName']))
					$completedPages['page5']['accountName'] = $_SESSION['accountName'];		
				if (isset($_SESSION['bsbNo']))
					$completedPages['page5']['bsbNo'] = $_SESSION['bsbNo'];	
				if (isset($_SESSION['accountNo']))
					$completedPages['page5']['accountNo'] = $_SESSION['accountNo'];		
				if (isset($_SESSION['ddAcknowdledgeName']))
					$completedPages['page5']['ddAcknowdledgeName'] = $_SESSION['ddAcknowdledgeName'];		
					
			} else {
			
				if (isset($_SESSION['ccAuthoriseName']))
					$completedPages['page5']['ccAuthoriseName'] = $_SESSION['ccAuthoriseName'];
				if (isset($_SESSION['ccPaymentDate']))
					$completedPages['page5']['ccPaymentDate'] = $_SESSION['ccPaymentDate'];
				if (isset($_SESSION['ccName']))
					$completedPages['page5']['ccName'] = $_SESSION['ccName'];	
				if (isset($_SESSION['ccNo']))
					$completedPages['page5']['ccNo'] = $_SESSION['ccNo'];		
				if (isset($_SESSION['ccExpiryMonth']))
					$completedPages['page5']['ccExpiryMonth'] = $_SESSION['ccExpiryMonth'];	
				if (isset($_SESSION['ccExpiryYear']))
					$completedPages['page5']['ccExpiryYear'] = $_SESSION['ccExpiryYear'];		
				if (isset($_SESSION['ccType']))
					$completedPages['page5']['ccType'] = $_SESSION['ccType'];	
				if (isset($_SESSION['ccAcknowdledgeName']))
					$completedPages['page5']['ccAcknowdledgeName'] = $_SESSION['ccAcknowdledgeName'];		
			}
		}
			
			
		//Page 6
		$completedPages['page6'] = array();
		
		if (isset($_SESSION['numberOfPartners']))
		{
			$completedPages['page6']['partnerAuthorisations'] = array();
			for ($i = 1; $i <= $completedPages['page3']['numberOfPartners']; $i++)
			{
				$partnerAuthorisation = array();
				if (isset($_SESSION['authoriseAckName'.$i]))
					$partnerAuthorisation['authoriseAckName'] = $_SESSION['authoriseAckName'.$i];
				if (isset($_SESSION['authoriseAckDOBDay'.$i]))
					$partnerAuthorisation['authoriseAckDOBDay'] = $_SESSION['authoriseAckDOBDay'.$i];
				if (isset($_SESSION['authoriseAckDOBMonth'.$i]))
					$partnerAuthorisation['authoriseAckDOBMonth'] = $_SESSION['authoriseAckDOBMonth'.$i];	
				if (isset($_SESSION['authoriseAckDOBYear'.$i]))
					$partnerAuthorisation['authoriseAckDOBYear'] = $_SESSION['authoriseAckDOBYear'.$i];	
				if (isset($_SESSION['authoriseAckLicence'.$i]))
					$partnerAuthorisation['authoriseAckLicence'] = $_SESSION['authoriseAckLicence'.$i];
				if (isset($_SESSION['authoriseAckSignature'.$i]))
					$partnerAuthorisation['authoriseAckSignature'] = $_SESSION['authoriseAckSignature'.$i];	
					
				$completedPages['page6']['partnerAuthorisations'][] = $partnerAuthorisation;	
			}
		}
			
		
		//Page 7
		$completedPages['page7'] = array();
		
		if (isset($_SESSION['numberOfPartners']))
		{
			$completedPages['page7']['partnerAcceptances'] = array();
			for ($i = 1; $i <= $completedPages['page3']['numberOfPartners']; $i++)
			{
				$partnerAcceptance = array();
				if (isset($_SESSION['acceptanceName'.$i]))
					$partnerAcceptance['acceptanceName'] = $_SESSION['acceptanceName'.$i];
				if (isset($_SESSION['acceptanceSignature'.$i]))
					$partnerAcceptance['acceptanceSignature'] = $_SESSION['acceptanceSignature'.$i];
					
				$completedPages['page7']['partnerAcceptances'][] = $partnerAcceptance;	
			}
		}
		
		return $completedPages;
	}

}

?>