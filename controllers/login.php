<?php

class Login_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'login';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		$header = new View_Model('header');
		$header->assign('active_nav','');
		$footer = new View_Model('footer');
		
		switch($getVars['logtype'])
		{	
			case 'customer':
				$heading = 'Customer Login';	
			break;
			
			case 'card-holder':
				$heading = 'Fuel Card Holder Login';
			break;
			
			case 'staff':
				$heading = 'Adshell Staff Login';
			break;
		}
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		// title for login page
		$view->assign('heading' , $heading);
		
		$view->render();
	}
}

?>