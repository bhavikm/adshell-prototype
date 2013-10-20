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
				break;
			
				case 'managecards':
					$content = new View_Model('customer-manage-cards');
					$view->assign('activeLink', 'managecards');
				break;
				
				case 'changecredit':
					$content = new View_Model('customer-change-credit');
					$view->assign('activeLink', 'changecredit');
				break;
				
				case 'viewinvoice':
					$content = new View_Model('customer-view-invoices');
					$view->assign('activeLink', 'viewinvoice');
				break;
			
				case 'changepay':
					$content = new View_Model('customer-change-pay');
					$view->assign('activeLink', 'changepay');
				break;
			
				case 'spendingsum':
					$content = new View_Model('customer-spend-summ');
					$view->assign('activeLink', 'spendingsum');
				break;
				
				case 'changepass':
					$content = new View_Model('account-change-pass');
					$view->assign('activeLink', 'changepass');
				break;
				
			}
		}
		
		//create a new view and pass it our template
		
		$view->assign('content', $content->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
}

?>