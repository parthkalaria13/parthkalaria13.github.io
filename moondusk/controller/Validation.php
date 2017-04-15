<?php

class Validation {
	
	private static $_errors = array();
	
	
	
	public static function vlidate($value, $rules = array(), $name, $matches = '', $matchesnme = '')
	{
		foreach ($rules as $rule => $rule_value)
		{
			if($rule === 'required' && empty($value))
			{
				self::addError("{$name} is required");
			}
			else if (!empty ($value))
			{
				switch($rule)
				{
					case 'min':
						if(strlen($value) < $rule_value)
						{
							self::addError("{$name} must be a grater than of {$rule_value} characters");
						}
						break;
					
					case 'max':
						if(strlen($value) > $rule_value)
						{
							self::addError("{$name} must be a less than of {$rule_value} characters");
						}
						break;
					
					case 'matches':
						if($value != $matches)
						{
							self::addError("{$name} must match {$matchesnme}");
						}
						break;
						
					case 'gender':
						$male = 'Male';
						$female = 'Female';
						if($value == $male || $value == $female)
						{
						} else {
							self::addError("{$name} must match . $male . or . $female . ");
						}
						break;
						
					case 'email':
						if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
							self::addError("Invalid {$name} format");
						}
						break;
						
					case 'date':
						$date_arr  = explode('-', $value);
						if (count($date_arr) == 3) {
							if (checkdate($date_arr[1], $date_arr[2], $date_arr[0])) {
							} else {
								self::addError("Invalid {$name} format it is must be YYYY-MM-DD or Invalid Date");
							}
						} else {
							self::addError("Invalid {$name} format it is must be YYYY-MM-DD or Invalid Date");
						}
						break;
						
					case 'intnumber':
						if(!filter_var($value, FILTER_VALIDATE_INT)) {
							self::addError("Invalid {$name} format");
						}
						break;
						
					case 'floatnumber':
						if(!filter_var($value, FILTER_VALIDATE_FLOAT)) {
							self::addError("Invalid {$name} format");
						}
						break;
						
					case 'intarray':
						$all_numeric = true;
						if(count($value) > 0) {
						
							foreach ($value as $key) {
								if (!(is_numeric($key))) {
									$all_numeric = false;
									break;
								}
							}
						}
							
						if ($all_numeric) {
							
						}
						else {
							self::addError("Invalid {$name} format");
						}
						break;
						
					case 'degreeskill':
						$male = 'DEGREE';
						$female = 'SKILL';
						if($value == $male || $value == $female)
						{
						} else {
							self::addError("{$name} must match . $male . or . $female . ");
						}
						break;
			
					default :
						
						break;
				}
			}
		}
		
		if(empty(self::$_errors))
		{
			return true;
		}
		
		return false;
	}
	
	public static function vlidateImage($value, $rules = array(), $name)
	{
		$file_exts = array("jpg", "jpeg", "gif", "png");
		$upload_exts = end(explode(".", $value["name"]));
		foreach ($rules as $rule => $rule_value)
		{
			switch($rule)
			{
				case 'name':
					if(file_exists($rule_value))
					{
						self::addError("file already exists");
					}
					break;
						
				case 'size':
					if($value["size"] > $rule_value)
					{
						self::addError("your file is too large");
					}
					break;
						
				case 'type':
					if((($value["type"] == "image/gif")
					|| ($value["type"] == "image/jpeg")
					|| ($value["type"] == "image/jpg")
					|| ($value["type"] == "image/png"))
					&& in_array($upload_exts, $file_exts))
					{
						
					} else {
						self::addError("your file type is not get by server only gif, jpeg, png and bmp file allowed.");
					}
					break;
						
				default :

					break;
			}
		}
	
		if(empty(self::$_errors))
		{
			return true;
		}
	
		return false;
	}
	
	public static function vlidateFile($value, $rules = array(), $name)
	{
		foreach ($rules as $rule => $rule_value)
		{
			switch($rule)
			{
				case 'name':
					if(file_exists($rule_value))
					{
						self::addError("file already exists");
					}
					break;
	
				case 'size':
					if($value["size"] > $rule_value)
					{
						self::addError("your file is too large maximum size is " . $rule_value/1024/1024 . "MB");
					}
					break;
	
				
	
				default :
	
					break;
			}
		}
	
		if(empty(self::$_errors))
		{
			return true;
		}
	
		return false;
	}
	
	private function addError($error) {
		self::$_errors[] = $error;
	}
	
	public static function getVlidationError() {
		return self::$_errors;
	}
}