<?php
class Util {
	static function returnRef($arr){
		$reff = array();

		foreach($arr as $key => $value)
			$reff[$key] = &$arr[$key];

		return $reff;
	}

	static function hash($string){
		return md5($string);
	}
}

?>