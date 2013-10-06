<?php

class Search_Controller
{
	/**
	 * This template variable will hold the 'view' portion of our MVC for this 
	 * controller
	 */
	public $template = 'search';
	
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
		//create a new view and pass it our template
		$view = new View_Model($this->template);
		$view->assign('header', $header->render(FALSE));
		$view->assign('footer', $footer->render(FALSE));
		
		if (isset($getVars['query']) && strlen(trim($getVars['query'])) != 0)
		{
			$searchModel = new Search_Model;
			$searchResults = $searchModel->searchInformationPages(trim($getVars['query']));
			
			$view->assign('results' , $searchResults);
		}
		$view->assign('query' , $getVars['query']);
		
		$view->render();
	}
}

?>