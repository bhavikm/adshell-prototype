<?php

class Customer_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'customer';
	
	private function getCustomerDetails()
	{
		$custModel = new Customer_Model;
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}  
		
		$custDetails = $custModel->getCustomerForAccount($_SESSION['user_name_logged']);
		$_SESSION['cust_name'] = $custDetails['businessName'];
		$_SESSION['appid'] = $custDetails['applicationID'];

		return $custDetails;
	}
	
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		if (!isset($_SESSION['cust_name']))
		{
			$this->getCustomerDetails();
		}
		
		$header = new View_Model('header');
		$header->assign('active_nav','');
	    $header->assign('logged_in',true);
		$header->assign('user_name','Customer Name');
		$header->assign('active_nav','');
		$footer = new View_Model('footer');
		
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		$content = new View_Model('customer-notifications');
		
		$loginModel = new Login_Model;
		$password_reset = $loginModel->is_valid_login_customer($_SESSION['user_name_logged'],'temppassword');
		
		if (!$password_reset)
		{
		$view->assign('passReset', false);
		$view->assign('activeLink', 'notifications');
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'notifications':
					$content = new View_Model('customer-notifications');
					$view->assign('activeLink', 'notifications');
				break;
			
				case 'modifyaccount':
					$content = new View_Model('customer-account-modify');
					$view->assign('activeLink', 'modifyaccount');
					$customerModel = new Customer_Model;
					$customerInfo = $customerModel->getCustomerInformation($_SESSION['appid']);
					$content->assign('detailedCustomer', $customerInfo);
					$content->assign('businessName', $customerInfo['businessName']);
				break;
				
				case 'changedetails':
					$content = new View_Model('customer-account-modify');
					$customerModel = new Customer_Model;
					$this->updateCustomerDetails($getVars);
					$customerInfo = $customerModel->getCustomerInformation($getVars['appid']);
					$content->assign('detailedCustomer', $customerInfo);
					$content->assign('businessName', $customerInfo['businessName']);
					$content->assign('notification', 'Details succesfully updated.');
					$content->assign('notification-type', 'success');
					$view->assign('activeLink', 'modifyaccount');
				break;
			
				
				case 'managecards':
					if (isset($getVars['second']))
					{
						switch($getVars['second'])
						{	
							case 'manage':
								$content = new View_Model('customer-manage-cards');
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($_SESSION['appid']);
								$content->assign('fuelCards', $fuelCards);
								$customerInfo =  $customerModel->getCustomerInformation($_SESSION['appid']);
								$content->assign('businessName', $customerInfo['businessName']);
							break;
							
							case 'resetpin':
								$content = new View_Model('customer-manage-cards');
								$fuelcardModel = new Fuelcard_Model;
								$fuelcardModel->resetCardPin($getVars['cardid']);
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($getVars['appid']);
								$content->assign('fuelCards', $fuelCards);
								$content->assign('notification', 'Pin Reset for Fuel Card ID '.$getVars['cardid']);
								$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('businessName', $customerInfo['businessName']);
							break;
							
							case 'updatestatus':
								$content = new View_Model('customer-manage-cards');
								$empModel = new Employee_Model;
								$empDetails = $empModel->getEmployeeForAccount($_SESSION['user_name_logged']);
								$fuelcardModel = new Fuelcard_Model;
								$fuelcardModel->updateCardStatus($getVars['cardid'],$getVars['status'],$empDetails['employeeID']);
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($getVars['appid']);
								$content->assign('fuelCards', $fuelCards);
								$content->assign('notification', 'Status updated for Fuel Card ID '.$getVars['cardid']);
								$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('businessName', $customerInfo['businessName']);
							break;
							
							case 'changeproducts':
								$content = new View_Model('customer-manage-fuel-card-products');
								$fuelcardModel = new Fuelcard_Model;
								$fuelCard = $fuelcardModel->getFuelCard($getVars['cardid']);
								$content->assign('fuelCard', $fuelCard);
								$customerModel = new Customer_Model;
								$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('businessName', $customerInfo['businessName']);
							break;
							
							case 'updateproducts':
								if (isset($getVars['fuelCardProducts']) && count($getVars['fuelCardProducts']) != 0)
								{
									$content = new View_Model('customer-manage-fuel-card-products');
									$fuelcardModel = new Fuelcard_Model;
									$fuelcardModel->updateFuelCardProducts($getVars['fuelCardProducts'],$getVars['cardid']);
									$fuelCard = $fuelcardModel->getFuelCard($getVars['cardid']);
									$content->assign('fuelCard', $fuelCard);
									$customerModel = new Customer_Model;
									$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
									$content->assign('businessName', $customerInfo['businessName']);
									$content->assign('notification', 'Fuel Card products were succesfully updated.');
								} else {
									$content = new View_Model('customer-manage-fuel-card-products');
									$fuelcardModel = new Fuelcard_Model;
									$fuelCard = $fuelcardModel->getFuelCard($getVars['cardid']);
									$content->assign('fuelCard', $fuelCard);
									$content->assign('notification', 'You must select at least one product');
									$content->assign('notification-type', 'warning');
									$customerModel = new Customer_Model;
									$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
									$content->assign('businessName', $customerInfo['businessName']);
								}
							break;
							
							case 'addcard':
								$content = new View_Model('customer-manage-cards');
								$fuelcardModel = new Fuelcard_Model;
								$fuelCardChangeID = $fuelcardModel->addFuelCardRequest($getVars['appid'],$getVars['cardHolderName'],$getVars['registrationNo'],$getVars['pinRequired'],'enabled');
								if (count($getVars['fuelCardProducts']) > 0)
								{
									$productIDs = array();
									foreach ($getVars['fuelCardProducts'] as $productKey)
									{
										$productIDs[] = $fuelcardModel->getProductTypeIDByKey($productKey);
									}
									
									 $fuelcardModel->addFuelcardChangeProducts($fuelCardChangeID,$productIDs);
								}
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($getVars['appid']);
								$content->assign('fuelCards', $fuelCards);
								$customerInfo =  $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('businessName', $customerInfo['businessName']);
								$content->assign('notification', 'Fuel Card succesfully ordered.');
								$content->assign('notification-type', 'success');
							break;
							
						}
					} else {
						
						$content = new View_Model('customer-manage-cards');
						$customerModel = new Customer_Model;
						$fuelCards = $customerModel->getCustomerFuelCards($_SESSION['appid']);
						$content->assign('fuelCards', $fuelCards);
						$customerInfo =  $customerModel->getCustomerInformation($_SESSION['appid']);
						$content->assign('businessName', $customerInfo['businessName']);
					}
					$view->assign('activeLink', 'managecards');
				break;
				
				case 'changecredit':
					$customerModel = new Customer_Model;
					$content = new View_Model('customer-change-credit');
					if (isset($getVars['second']))
					{
						switch($getVars['second'])
						{	
							case 'approvechange':
								$customerModel->addCreditLimitRequest($getVars['appid'],$getVars['newlimit']);
								$content->assign('notification', 'Your credit limit request has been sent for approval.');
								$content->assign('notification-type', 'warning');
							break;
							
							case 'change':
								$customerModel->updateCustomerCredit($getVars['newlimit'], $getVars['appid']);
								$content->assign('notification', 'Your credit limit was updated succesfully.');
								$content->assign('notification-type', 'success');
							break;
						}
					}
					$pendingChange = $customerModel->checkIfPendingCreditChange($_SESSION['appid']);
					$content->assign('pendingChange', $pendingChange);
					$customerInfo = $customerModel->getCustomerInformation($_SESSION['appid']);
					$content->assign('detailedCustomer', $customerInfo);
					$view->assign('activeLink', 'changecredit');
				break;
				
				case 'viewinvoice':
					$content = new View_Model('customer-view-invoices');
					$view->assign('activeLink', 'viewinvoice');
				break;
				
				case 'view-invoice-detail':
					$content = new View_Model('customer-detailed-invoice');
					$view->assign('activeLink', 'viewinvoice');
					$customerModel = new Customer_Model;
					$fuelCards = $customerModel->getCustomerFuelCards($_SESSION['appid']);
					$content->assign('fuelCards', $fuelCards);
					$customerInfo =  $customerModel->getCustomerInformation($_SESSION['appid']);
					$content->assign('detailedCustomer', $customerInfo);
					$content->assign('businessName', $customerInfo['businessName']);
				break;
			
				case 'changepay':
					$content = new View_Model('customer-change-pay');
					$view->assign('activeLink', 'changepay');
				break;
			
				case 'spendingsum':
					$content = new View_Model('customer-spend-summ');
					$customerModel = new Customer_Model;
					$fuelCards = $customerModel->getCustomerFuelCards($_SESSION['appid']);
					$content->assign('fuelCards', $fuelCards);
					$view->assign('activeLink', 'spendingsum');
				break;
				
				case 'changepass':
					$content = new View_Model('account-change-pass');
					$view->assign('activeLink', 'changepass');
					$content->assign('accountType', 'customer');
					if (isset($getVars['second']))
					{
						$error = false;
						// Check if old password is correct first
						$loginModel = new Login_Model;
						if ($loginModel->is_valid_login_customer($_SESSION['user_name_logged'],$getVars['passwordCurrent']))
						{
							// make sure new passwords are matching
							if (strlen($getVars['newPassword1']) != 0 && ($getVars['newPassword1'] == $getVars['newPassword2']))
							{
								//then update to new password
								$loginModel->update_login_password($_SESSION['user_name_logged'],$getVars['newPassword1']);
							} elseif (strlen($getVars['newPassword1']) == 0) { 
								$error = "Your new password can not be empty.";
							} else {
								$error = "Your new passwords do not match.";
							}
						} else {
							$error = "Your current password is incorrect.";
						}
						
						$content->assign('error', $error);
					} 
					$view->assign('activeLink', 'changepass');
				break;
				
			}
		}
		
		} else {
			if (isset($getVars['second']) && $getVars['second'] == 'newpass')
			{
				$error = false;
				// Check if old password is correct first
				$loginModel = new Login_Model;
				if ($loginModel->is_valid_login_customer($_SESSION['user_name_logged'],$getVars['passwordCurrent']))
				{
					// make sure new passwords are matching
					if (strlen($getVars['newPassword1']) != 0 && ($getVars['newPassword1'] == $getVars['newPassword2']))
					{
						//then update to new password
						$loginModel->update_login_password($_SESSION['user_name_logged'],$getVars['newPassword1']);
						$content = new View_Model('customer-notifications');
						$view->assign('activeLink', 'notifications');
						$view->assign('notification', 'Your password has been succefully reset.');
						$view->assign('passReset', false);
						
					} elseif (strlen($getVars['newPassword1']) == 0) { 
						$error = "Your new password can not be empty.";
					} else {
						$error = "Your new passwords do not match.";
					}
				} else {
					$error = "Your temporary password is incorrect.";
				}
				
				if ($error)
				{
					$view->assign('passReset', true);
					$content = new View_Model('account-change-pass');
					$content->assign('accountType', 'customer');
					$content->assign('passmessage', true);
					$content->assign('error', $error);
				}
			} else {
			
				$view->assign('passReset', true);
				$content = new View_Model('account-change-pass');
				$content->assign('accountType', 'customer');
				$content->assign('passmessage', true);
			}
		}
		//create a new view and pass it our template
		
		$view->assign('content', $content->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
	
	private function updateCustomerDetails($fieldValues)
	{
		$customerModel = new Customer_Model;
		$customerModel->updateCustomerDetails($fieldValues['contactFirstName'],$fieldValues['contactLastName'],$fieldValues['inputEmail'],$fieldValues['inputPhone'],$fieldValues['inputPosition'],$fieldValues['inputMobile'],$fieldValues['inputFax'],$fieldValues['appid']);
		
		$applyModel = new Apply_Model;
		$businessTypeID = $applyModel->getBusinessTypeID($fieldValues['biztype']);
		
		$customerModel->updateBusinessDetails($businessTypeID,$fieldValues['abn'],$fieldValues['yearBizStart'],$fieldValues['businessName'],$fieldValues['operations'],$fieldValues['tradingName'],$fieldValues['appid']);
	}
}

?>