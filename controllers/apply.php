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
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($getVars['page']))
		{
			switch ($getVars['page'])
			{	
				case '2':
					$errorAndValids = $this->validatePage1($getVars);
					if (count($errorAndValids['errors']) > 0 || count($errorAndValids['valids']) == 0)
					{
						$this->template = 'apply-2';
					} else {
						// move on to next page
						$this->template = 'apply-3';
					}
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
		
		//assign the errors array to the template data
		$view->assign('errors', $errorAndValids['errors']);
		$view->assign('valids', $errorAndValids['valids']);
		
		$view->render();
	}
	
	private function validatePage1($fieldValues)
	{
		session_start();
		
		$errorAndValids = array('errors' => array(), 'valids' => array());
		
		if (isset($fieldValues['biztype']))
		{
			if ($fieldValues['biztype']  == 'select')
			{
				$errorAndValids['errors']['biztype'] = 'You must select a business type.';
			} else {
				$_SESSION['biztype'] = $fieldValues['biztype'];
				$errorAndValids['valids']['biztype'] = $fieldValues['biztype'];
			}
		}
		
		if (isset($fieldValues['businessName']))
		{
			if (strlen($fieldValues['businessName']) == 0 )
			{
				$errorAndValids['errors']['businessName'] = 'Business name must not be empty.';
			} elseif (strlen($fieldValues['businessName']) > 40) { 
				$errorAndValids['errors']['businessName'] = 'Business name must be 40 characters or less.';
			} else {
				$_SESSION['businessName'] = $fieldValues['businessName'];
				$errorAndValids['valids']['businessName'] = $fieldValues['businessName'];
			}
		}
		
		if (isset($fieldValues['tradingName']))
		{
			if (strlen($fieldValues['tradingName']) == 0 )
			{
				$errorAndValids['errors']['tradingName'] = 'Trading name must not be empty.';
			} elseif (strlen($fieldValues['tradingName']) > 60) { 
				$errorAndValids['errors']['tradingName'] = 'Trading name must be 60 characters or less.';
			} else {
				$_SESSION['tradingName'] = $fieldValues['tradingName'];
				$errorAndValids['valids']['tradingName'] = $fieldValues['tradingName'];
			}
		}
		
		if (isset($fieldValues['yearBizStart']))
		{
			if (strlen($fieldValues['yearBizStart']) == 0 )
			{
				$errorAndValids['errors']['yearBizStart'] = 'Business start year must not be empty.';
			} elseif (strlen($fieldValues['yearBizStart']) != 4) { 
				$errorAndValids['errors']['yearBizStart'] = 'Business start year must be valid.';
			} else {
				$_SESSION['yearBizStart'] = $fieldValues['yearBizStart'];
				$errorAndValids['valids']['yearBizStart'] = $fieldValues['yearBizStart'];
			}
		}
		
		if (isset($fieldValues['abn']))
		{
			if (strlen($fieldValues['abn']) == 0 )
			{
				$errorAndValids['errors']['abn'] = 'ABN/ACN not be empty.';
			} elseif (strlen($fieldValues['abn']) > 11) { 
				$errorAndValids['errors']['abn'] = 'ABN/ACN must be 11 digits or less.';
			} else {
				$_SESSION['abn'] = $fieldValues['abn'];
				$errorAndValids['valids']['abn'] = $fieldValues['abn'];
			}
		}
		
		if (isset($fieldValues['operations']))
		{
			if (strlen($fieldValues['operations']) == 0 )
			{
				$errorAndValids['errors']['operations'] = 'Nature of operations not be empty.';
			} elseif (strlen($fieldValues['operations']) > 200) { 
				$errorAndValids['errors']['operations'] = 'Nature of operations must be 200 characters or less.';
			} else {
				$_SESSION['operations'] = $fieldValues['operations'];
				$errorAndValids['valids']['operations'] = $fieldValues['operations'];
			}
		}
		
		if (isset($fieldValues['contactFirstName']))
		{
			if (strlen($fieldValues['contactFirstName']) == 0 )
			{
				$errorAndValids['errors']['contactFirstName'] = 'First name must not be empty.';
			} elseif (strlen($fieldValues['contactFirstName']) > 15) { 
				$errorAndValids['errors']['contactFirstName'] = 'First name must be 15 characters or less.';
			} else {
				$_SESSION['contactFirstName'] = $fieldValues['contactFirstName'];
				$errorAndValids['valids']['contactFirstName'] = $fieldValues['contactFirstName'];
			}
		}
		
		if (isset($fieldValues['contactLastName']))
		{
			if (strlen($fieldValues['contactLastName']) == 0 )
			{
				$errorAndValids['errors']['contactLastName'] = 'Last name must not be empty.';
			} elseif (strlen($fieldValues['contactLastName']) > 15) { 
				$errorAndValids['errors']['contactLastName'] = 'Last name must be 15 characters or less.';
			} else {
				$_SESSION['contactLastName'] = $fieldValues['contactLastName'];
				$errorAndValids['valids']['contactLastName'] = $fieldValues['contactLastName'];
			}
		}
		
		if (isset($fieldValues['inputPosition']))
		{
			if (strlen($fieldValues['inputPosition']) == 0 )
			{
				$errorAndValids['errors']['inputPosition'] = 'Position must not be empty.';
			} elseif (strlen($fieldValues['inputPosition']) > 40) { 
				$errorAndValids['errors']['inputPosition'] = 'Position must be 40 characters or less.';
			} else {
				$_SESSION['inputPosition'] = $fieldValues['inputPosition'];
				$errorAndValids['valids']['inputPosition'] = $fieldValues['inputPosition'];
			}
		}
		
		if (isset($fieldValues['inputPhone']))
		{
			if (strlen($fieldValues['inputPhone']) == 0 )
			{
				$errorAndValids['errors']['inputPhone'] = 'Phone must not be empty.';
			} elseif (strlen($fieldValues['inputPhone']) > 10) { 
				$errorAndValids['errors']['inputPhone'] = 'Phone number must be 10 digits or less.';
			} else {
				$_SESSION['inputPhone'] = $fieldValues['inputPhone'];
				$errorAndValids['valids']['inputPhone'] = $fieldValues['inputPhone'];
			}
		}
		
		if (isset($fieldValues['inputFax']))
		{
			if (strlen($fieldValues['inputFax']) == 0 )
			{
				$errorAndValids['errors']['inputFax'] = 'Fax must not be empty.';
			} elseif (strlen($fieldValues['inputFax']) > 10) { 
				$errorAndValids['errors']['inputFax'] = 'Fax number must be 10 digits or less.';
			} else {
				$_SESSION['inputFax'] = $fieldValues['inputFax'];
				$errorAndValids['valids']['inputFax'] = $fieldValues['inputFax'];
			}
		}
		
		if (isset($fieldValues['inputMobile']))
		{
			if (strlen($fieldValues['inputMobile']) == 0 )
			{
				$errorAndValids['errors']['inputMobile'] = 'Mobile must not be empty.';
			} elseif (strlen($fieldValues['inputMobile']) > 10) { 
				$errorAndValids['errors']['inputMobile'] = 'Mobile number must be 10 digits or less.';
			} else {
				$_SESSION['inputMobile'] = $fieldValues['inputMobile'];
				$errorAndValids['valids']['inputMobile'] = $fieldValues['inputMobile'];
			}
		}
		
		if (isset($fieldValues['inputEmail1']))
		{
			if (strlen($fieldValues['inputEmail1']) == 0 )
			{
				$errorAndValids['errors']['inputEmail1'] = 'Email address must not be empty.';
			} elseif (strlen($fieldValues['inputEmail1']) > 80) { 
				$errorAndValids['errors']['inputEmail1'] = 'Email address must be 80 characters or less.';
			} else {
				$_SESSION['inputEmail1'] = $fieldValues['inputEmail1'];
				$errorAndValids['valids']['inputEmail1'] = $fieldValues['inputEmail1'];
			}
		}
		
		if (isset($fieldValues['creditLimit']))
		{
			if (strlen($fieldValues['creditLimit']) == 0 )
			{
				$errorAndValids['errors']['creditLimit'] = 'Credit limit must not be empty.';
			} elseif (strlen($fieldValues['creditLimit']) > 5) { 
				$errorAndValids['errors']['creditLimit'] = 'Credit limit must be 5 digits or less.';
			} else {
				$_SESSION['creditLimit'] = $fieldValues['creditLimit'];
				$errorAndValids['valids']['creditLimit'] = $fieldValues['creditLimit'];
			}
		}
		
		
		return $errorAndValids;
	}
	
	//
	private function splitErrorsAndValid($errorAndValids)
	{
	
	
	}
}

?>