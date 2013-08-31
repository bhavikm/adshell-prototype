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
		
		$valid_user = 'not checked';
		
		if (isset($getVars['logtype']))
		{
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
				
				case 'forgot':
					$this->template = 'forgot';
					$heading = '';
				break;
			}
		} else {
			$heading = 'Login';
		}
		
		if (isset($getVars['action']) && isset($getVars['email']))
		{
			switch($getVars['action'])
			{	
				case 'forgot':
					$this->template = 'forgot';
					//create a new view and pass it our template
					$view = new View_Model($this->template);
					$view->assign('header', $header->render(FALSE));
					$view->assign('footer', $footer->render(FALSE));
					
					$email = $getVars['email'];
					if ($email == 'employee@adshell.com.au' || $email == 'customer@email.com' ||
						$email == 'cardholder@email.com')
					{
						$valid_user = 'confirmed';
					} else {
						$valid_user = 'incorrect';
					}
					// title for login page
					$view->assign('valid_user' , $valid_user);
					
					$view->render();
				break;
				
				case 'login':
					if (isset($getVars['password']) && ($getVars['password'] == 'password'))
					{
						$email = $getVars['email'];
						if ($email == 'employee@adshell.com.au')
						{
							header('Location: index.php?employee&user='.$email);
						}
						elseif ($email == 'customer@email.com') 
						{
							header('Location: index.php?customer&user='.$email);
						}
						elseif ($email == 'cardholder@email.com')
						{
							header('Location: index.php?cardholder&user='.$email);
						}
						else {
							$valid_user = 'incorrect';
						}
					} else {
						$valid_user = 'incorrect';
					}
					//create a new view and pass it our template
					$view = new View_Model($this->template);
					$view->assign('header', $header->render(FALSE));
					$view->assign('footer', $footer->render(FALSE));
					
					// title for login page
					$view->assign('heading' , $heading);
					
					
					$view->assign('valid_user' , $valid_user);
					
					
					$view->render();
							
				break;
			
			}
			
			
			
		} else {
			
			//create a new view and pass it our template
			$view = new View_Model($this->template);
			$view->assign('header', $header->render(FALSE));
			$view->assign('footer', $footer->render(FALSE));
			
			// title for login page
			$view->assign('heading' , $heading);
			
			
			$view->assign('valid_user' , $valid_user);
			
			
			$view->render();
		}
	}
}

?>