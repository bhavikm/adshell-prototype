<?php

class Validation
{
	public function __construct()
	{
	
	}
	
	public function stringIsInteger($string)
	{
		if (preg_match('/^\d+$/',$string))
		{
			return true;
		} else {
			return false;
		}
	}


}

?>