<?php

class Employee_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'employee';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		$header = new View_Model('header');
		$header->assign('logged_in',true);
		$header->assign('user_name','Adshell Employee');
		$header->assign('active_nav','');
		$footer = new View_Model('footer');
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'notifications':
					$content = new View_Model('customer-notifications');
				break;
			
				case 'modifyaccount':
					$content = new View_Model('employee-modify-account');
				break;
			
				case 'managecust':
					$content = new View_Model('employee-manage-cust');
				break;
				
				case 'viewrequests':
					$content = new View_Model('employee-view-requests');
				break;
				
				case 'viewapplications':
					$content = new View_Model('employee-view-apps');
				break;
				
				case 'changepass':
					$content = new View_Model('customer-change-pass');
				break;
			}
		} else {
			$content = new View_Model('customer-notifications');
		}
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		$view->assign('content', $content->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
}

?>