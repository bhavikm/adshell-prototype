<?php

class CardHolder_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'cardholder';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		$header = new View_Model('header');
		$header->assign('active_nav','');
		$header->assign('logged_in',true);
		$header->assign('user_name','Card Holder');
		$footer = new View_Model('footer');
		
		
		if (isset($getVars['action']))
		{
			switch($getVars['action'])
			{	
				case 'notifications':
					$content = new View_Model('cardholder-notifications');
				break;
			
				case 'modifypin':
					$content = new View_Model('cardholder-change-pin');
				break;
			
				case 'spendingsum':
					$content = new View_Model('customer-spend-summ');
				break;
				
				case 'changepass':
					$content = new View_Model('customer-change-pass');
				break;
			}
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