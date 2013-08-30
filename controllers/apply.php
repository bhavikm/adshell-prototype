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