<?php

class Apply_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'apply';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		$header = new View_Model('header');
		$header->assign('active_nav','apply');
		$footer = new View_Model('footer');
		
		if (isset($getVars['page']))
		{
			switch ($getVars['page'])
			{	
				case '2':
					$this->template = 'apply-2';
				break;
				
				case '3':
					$this->template = 'apply-3';
				break;
				
				case '4':
					$this->template = 'apply-4';
				break;
				
				case '5':
					$this->template = 'apply-5';
				break;
				
				case '6':
					$this->template = 'apply-6';
				break;
				
				case '7':
					$this->template = 'apply-7';
				break;
				
				case '8':
					$this->template = 'apply-8';
				break;
				
				case '9':
					$this->template = 'apply-9';
				break;
				
				case '10':
					$this->template = 'apply-10';
				break;
			}
		
		}
		
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
}

?>