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
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'login':
					if (isset($getVars['username']) && isset($getVars['password']))
					{
						if (strlen($getVars['username']) == 0 || strlen($getVars['password']) == 0)
						{
							$error = true;
							$error_message = "User name and password must not be empty.";
						} else {
							$loginModel = new Login_Model;
							switch($getVars['logtype'])
							{	
								case 'customer':
									$login_correct = $loginModel->is_valid_login_customer($getVars['username'],$getVars['password']);
								break;
							
								case 'staff':
									$login_correct = $loginModel->is_valid_login_employee($getVars['username'],$getVars['password']);
								break;
							}
							
							
							if ($login_correct)
							{
								session_start();
								$_SESSION['user_logged_in'] = true;
								$_SESSION['user_name_logged'] = $getVars['username'];
								
								switch($getVars['logtype'])
								{	
									case 'customer':
										$_SESSION['user_type'] = 'customer';
										header("Location: index.php?customer");	
									break;
								
									case 'staff':
										$_SESSION['user_type'] = 'staff';
										header("Location: index.php?employee");
									break;
								}
								
							} else {
								$error = true;
								$error_message = "User name or password is incorrect.";
							}
						}
					}
				break;
			
				case 'forgot':
					if (isset($getVars['username']))
					{
						if (strlen($getVars['username']) == 0 )
						{
							$error = true;
							$error_message = "User name must not be empty.";
						} else {
						
						}
					}
				break;
				
				
				case 'logout':
					session_start();
					session_unset();
					session_destroy();
					session_write_close();
					setcookie(session_name(),'',0,'/');
					session_regenerate_id(true);
				break;
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