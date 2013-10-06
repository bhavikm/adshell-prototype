<?php

class Employee_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'employee';
	
	private function getEmployeeDetails()
	{
		$empModel = new Employee_Model;
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}  
		
		$empDetails = $empModel->getEmployeeForAccount($_SESSION['user_name_logged']);
		$_SESSION['emp_name'] = $empDetails['empName'];
		
		return $empDetails;
	}
	
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		if (!isset($_SESSION['employee_name']))
		{
			$this->getEmployeeDetails();
		}
		
	
		$header = new View_Model('header');
		$header->assign('logged_in',true);
		$header->assign('user_name','Adshell Employee');
		$header->assign('active_nav','');
		$footer = new View_Model('footer');
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		$content = new View_Model('employee-view-requests');
		
		$view->assign('activeLink', 'viewrequests');
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'managefuel':
					if (isset($getVars['second']))
					{
						switch($getVars['second'])
						{	
							case 'manage':
								$content = new View_Model('employee-update-fuelcards');
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($getVars['appid']);
								$content->assign('fuelCards', $fuelCards);
							break;
						
							case 'view':
								$content = new View_Model('employee-view-cust-fuelcards');
								$customerModel = new Customer_Model;
								$fuelCards = $customerModel->getCustomerFuelCards($getVars['appid']);
								$content->assign('fuelCards', $fuelCards);
							break;
						}
					} else {
						$content = new View_Model('employee-manage-fuel');
						$customerModel = new Customer_Model;
						$briefCustomers = $customerModel->getBriefCustomerInformation();
						$content->assign('briefCustomers', $briefCustomers);
					}
					$view->assign('activeLink', 'managefuel');
				break;
			
				case 'modifyaccount':
					$content = new View_Model('employee-modify-account');
					if (isset($getVars['second']))
					{
						$error = false;
						
						$validate = $this->validateEmpDetails($getVars['jobDesc'], $getVars['empName'], $getVars['empPhone'], $getVars['empAddress']);
	
						if (!$validate['errors'])
						{
							$empModel = new Employee_Model;
							$empID = $empModel->getEmpIDFromAccountName($_SESSION['user_name_logged']);
							$empModel->updateEmployeeDetails($getVars['jobDesc'], $getVars['empName'], $getVars['empPhone'], $getVars['empAddress'], $empID);
						} else {
							$error = true;
							$content->assign('error_messages', $validate['error_messages']);
						}
						
						$content->assign('error', $error);
					} 
					$employeeDetails = $this->getEmployeeDetails();
					$content->assign('employeeDetails', $employeeDetails);
					
					$view->assign('activeLink', 'modifyaccount');
				break;
			
				case 'managecust':
					if (isset($getVars['second']))
					{
						switch($getVars['second'])
						{	
							case 'manage':
								$content = new View_Model('employee-update-cust');
								$customerModel = new Customer_Model;
								$customerInfo = $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('detailedCustomer', $customerInfo);
							break;
						
							case 'view':
								$content = new View_Model('employee-manage-cust-detailed');
								$customerModel = new Customer_Model;
								$customerInfo = $customerModel->getCustomerInformation($getVars['appid']);
								$content->assign('detailedCustomer', $customerInfo);
							break;
						}
					} else {
						$content = new View_Model('employee-manage-cust');
						$customerModel = new Customer_Model;
						$briefCustomers = $customerModel->getBriefCustomerInformation();
						$content->assign('briefCustomers', $briefCustomers);
					}
					$view->assign('activeLink', 'managecust');
				break;
				
				case 'viewrequests':
					
					$content = new View_Model('employee-view-requests');
					$view->assign('activeLink', 'viewrequests');
				break;
				
				case 'manageapps':
					if (isset($getVars['second']))
					{
						switch($getVars['second'])
						{	
							case 'detailapp':
								$content = new View_Model('employee-detail-application');
								$detailedApplication = $this->getDetailedApplicationData($getVars['appid']);
								$content->assign('detailedApplication', $detailedApplication[0]);
							break;
						
							case 'searchapp':
								$content = new View_Model('employee-view-apps');
								$error = false;
						
								if (strlen(trim($getVars['appSearch'])) != 0)
								{
									$applyModel = new Apply_Model;
									$results = $applyModel->getApplicationByID($getVars['appSearch']);
									
									$content->assign('searchResults', $results);
								} else {
									$error = true;
								}
								
								$briefApplications = $this->getApplicationsData('pending');
								$content->assign('briefApplications', $briefApplications);
								$briefApplicationsApproved = $this->getApplicationsData('approved');
								$content->assign('briefApplicationsApproved', $briefApplicationsApproved);
						
								$briefApplicationsRejected = $this->getApplicationsData('rejected');
								$content->assign('briefApplicationsRejected', $briefApplicationsRejected);
								
								$content->assign('error', $error);
							break;
						}
					
					} else {
						$content = new View_Model('employee-view-apps');
						$briefApplications = $this->getApplicationsData('pending');
						$content->assign('briefApplications', $briefApplications);
						
						$briefApplicationsApproved = $this->getApplicationsData('approved');
						$content->assign('briefApplicationsApproved', $briefApplicationsApproved);
						
						$briefApplicationsRejected = $this->getApplicationsData('rejected');
						$content->assign('briefApplicationsRejected', $briefApplicationsRejected);
					}
					$view->assign('activeLink', 'manageapps');
				break;
				
				case 'approveapp':
					$empModel = new Employee_Model;
					$empID = $empModel->getEmpIDFromAccountName($_SESSION['user_name_logged']);
					$applyModel = new Apply_Model;
					$customerID = $applyModel->approveApplication($getVars['appid'],$empID);
					$content = new View_Model('employee-view-apps');
					$briefApplications = $this->getApplicationsData('pending');
					$content->assign('briefApplications', $briefApplications);
					$briefApplicationsApproved = $this->getApplicationsData('approved');
					$content->assign('briefApplicationsApproved', $briefApplicationsApproved);
						
					$briefApplicationsRejected = $this->getApplicationsData('rejected');
					$content->assign('briefApplicationsRejected', $briefApplicationsRejected);
					
					$view->assign('activeLink', 'manageapps');
				break;
				
				
				case 'rejectapp':
					$empModel = new Employee_Model;
					$empID = $empModel->getEmpIDFromAccountName($_SESSION['user_name_logged']);
					$applyModel = new Apply_Model;
					$applyModel->rejectApplication($getVars['appid'],$empID);
					$content = new View_Model('employee-view-apps');
					$briefApplications = $this->getApplicationsData('pending');
					$content->assign('briefApplications', $briefApplications);
					$briefApplicationsApproved = $this->getApplicationsData('approved');
					$content->assign('briefApplicationsApproved', $briefApplicationsApproved);
						
					$briefApplicationsRejected = $this->getApplicationsData('rejected');
					$content->assign('briefApplicationsRejected', $briefApplicationsRejected);
					
					$view->assign('activeLink', 'manageapps');
				break;
				
				case 'searchemployee':
					$content = new View_Model('employee-search-directory');
					if (isset($getVars['second']))
					{
						$error = false;
						
						if (strlen(trim($getVars['empSearch'])) != 0)
						{
							$query = explode(" ", trim($getVars['empSearch']));
							$empModel = new Employee_Model;
							if (count($query) > 1)
							{
								$results = $empModel->searchEmployees($query[0],$query[1]);
							} else {
								$results = $empModel->searchEmployees($query[0],"");
							}
							$content->assign('searchResults', $results);
						} else {
							$error = true;
						}
						
						$content->assign('error', $error);
					} 
					
					$view->assign('activeLink', 'searchemployee');
				break;
				
				case 'changepass':
					$content = new View_Model('account-change-pass');
					$content->assign('accountType', 'employee');
					if (isset($getVars['second']))
					{
						$error = false;
						// Check if old password is correct first
						$loginModel = new Login_Model;
						if ($loginModel->is_valid_login_employee($_SESSION['user_name_logged'],$getVars['passwordCurrent']))
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
		} else {
			$content = new View_Model('employee-view-requests');
			
			$view->assign('activeLink', 'viewrequests');
		}
		
		
		
		$view->assign('content', $content->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
	
	private function getApplicationsData($status)
	{
		$returnData = array();
		
		$applyModel = new Apply_Model;
		$briefAppDetails = $applyModel->getBriefApplicationDetails($status);
		$returnData['briefApplications'] = $briefAppDetails;
		
		return $briefAppDetails;
	}
	
	private function getDetailedApplicationData($applicationID)
	{
		$returnData = array();
		
		$applyModel = new Apply_Model;
		$detailedApplication = $applyModel->getDetailedApplication($applicationID);
		
		return $detailedApplication;
	}
	
	private function validateEmpDetails($jobDesc, $empName, $empPhone, $empAddress)
	{
		$validation = array('errors' => false, 'error_messages' => array());
		
		if (strlen($jobDesc) == 0 || strlen($jobDesc) > 250)
		{
			$validation['errors'] = true;
			$validation['error_messages']['jobDesc'] = "Job Description must not be empty and must be less than 250 characters.";
		}
		if (strlen($empName) == 0 || strlen($empName) > 250)
		{
			$validation['errors'] = true;
			$validation['error_messages']['empName'] = "Name must not be empty and must be less than 40 characters.";
		}
		if (strlen($empPhone) < 8 || strlen($empPhone) > 10 || !$this->stringIsInteger($empPhone))
		{
			$validation['errors'] = true;
			$validation['error_messages']['empPhone'] = "Phone number must be between 8 and 10 digits.";
		}
		if (strlen($empAddress) == 0 || strlen($empAddress) > 200)
		{
			$validation['errors'] = true;
			$validation['error_messages']['empAddress'] = "Address must not be empty and must be less than 200 characters.";
		}
		
		return $validation;
	}
	
	public function stringIsInteger($string)
	{
		if (preg_match("/^[0-9]+$/",$string))
		{
			return true;
		} else {
			return false;
		}
	}
}

?>