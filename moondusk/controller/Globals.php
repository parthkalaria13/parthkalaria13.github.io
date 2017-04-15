<?php

class Globals {
	public static function get($path = NULL) {
		if($path){
			$globals = $GLOBALS['globals'];
			$path = explode('/', $path);

			foreach($path as $bit) {
				if(isset($globals[$bit])){
					$globals = $globals[$bit];
				}
			}

			return $globals;
		}

		return false;
	}
}