<?php
include_once("settings/config.php");
include_once("util.php");
include_once("db/connection.php");

include_once("user/Register.php");
include_once("user/login.php");

class Engine {
	static function s_print($e){
		echo json_encode($e);
	}

	static function input(){
		return json_decode(file_get_contents("php://input"));
	}

	static function func_route($class, $function, $data){
		$object = new $class();
		$object->load($data);

		if($out = call_user_func(array($object, $function))){
			self::s_print($out);
		} else echo 0;
	}
}

if ($_GET['method'] == 'route'){
	$data = Engine::input();
		$class = $data->class;
		$function = $data->function;
		$data = $data->data;
	
	Engine::func_route($class, $function, $data);
}
?>