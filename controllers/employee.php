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
		
		$content = new View_Model('customer-notifications');
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'managefuel':
					$content = new View_Model('employee-manage-fuel');
				break;
			
				case 'modifyaccount':
					$content = new View_Model('employee-modify-account');
					$employeeDetails = $this->getEmployeeDetails();
					$content->assign('employeeDetails', $employeeDetails);
				break;
			
				case 'managecust':
					$content = new View_Model('employee-manage-cust');
				break;
				
				case 'viewrequests':
					
					$content = new View_Model('employee-view-requests');
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
								$content = new View_Model('employee-modify-account');
							break;
						}
					
					} else {
						$content = new View_Model('employee-view-apps');
						$briefApplications = $this->getApplicationsData();
						$content->assign('briefApplications', $briefApplications);
					}
				break;
				
				
				case 'searchemployee':
					$content = new View_Model('employee-search-directory');
				break;
				
				case 'changepass':
					$content = new View_Model('customer-change-pass');
				break;
			}
		} else {
			$content = new View_Model('customer-notifications');
		}
		
		
		
		$view->assign('content', $content->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
	
	private function getApplicationsData()
	{
		$returnData = array();
		
		$applyModel = new Apply_Model;
		$briefAppDetails = $applyModel->getBriefApplicationDetails('pending');
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
}

?>