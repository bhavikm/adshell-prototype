<?php

class Main_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'main';
	
	/**
	 * This is the default function that will be called by router.php
	 * 
	 * @param array $getVars the GET variables posted to index.php
	 */
	public function main(array $getVars)
	{
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		
		//assign article data to view
		//$view->assign('article' , $article);
		
		$view->render();
	}
}

?>