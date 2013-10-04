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
		
		
		if (isset($getVars['logtype']))
		{
			switch($getVars['logtype'])
			{	
				case 'customer':
					$heading = 'Customer Login';	
				break;
			
				case 'staff':
					$heading = 'Adshell Staff Login';
				break;
				
				case 'forgot':
					$heading = 'Forgot Password';
				break;
				
				default:
					$heading = 'Customer Login';
				break;
			}
		} else {
			$heading = 'Customer Login';
		}
		
		$error = false;
		
		if (isset($getVars['username']) && isset($getVars['password']))
		{
			if (strlen($getVars['username']) == 0 || strlen($getVars['password']) == 0)
			{
				$error = true;
				$error_message = "User name and password must not be empty.";
			} else {
				echo $getVars['logtype'].'<br />';
				echo $getVars['username'].'<br />';
				echo $getVars['password'].'<br />';
				$loginModel = new Login_Model;
				$login_correct = $loginModel->is_valid_login($getVars['username'],$getVars['password']);
				echo $login_correct;
				if ($login_correct)
				{
					switch($getVars['logtype'])
					{	
						case 'customer':
							header("Location: index.php?customer");	
						break;
					
						case 'staff':
							header("Location: index.php?employee");
						break;
					}
					
				} else {
					$error = true;
					$error_message = "User name or password is incorrect.";
				}
			}
		}
		
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		// title for login page
		$view->assign('heading' , $heading);
		$view->assign('error' , $error);
		if ($error)
		{
			$view->assign('error_message' , $error_message);
		}
		
		$view->render();
	}
}

?>