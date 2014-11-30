<?php
class sConnect {
	public $link = null;
	public $stmt = null;
	public $db_selected = null;

	public function connect(){
		$this->link = mysqli_connect(DB_HOST, DB_USERNAME, '', DB_NAME);
	}

	public function close(){
		return mysqli_close($this->link);
	}

	//prepare statement
	public function prepare($sql){
		$this->stmt = mysqli_prepare($this->link, $sql);
	}

	public function bind($arr){
		call_user_func_array(array($this->stmt, "bind_param"), Util::returnRef($arr));
	}

	public function executeStmt(){
		$this->stmt->execute();
	}

	public function getResult(){
		$result = $this->stmt->get_result();
		$data = array();
		while($row = $result->fetch_object()){
			$data[] = $row;
		}

		//dont think there is ever a case where we wouldn't want to clear the statement
		mysqli_stmt_free_result($this->stmt);

		return $data;
	}

	public function getErrors(){
		return mysqli_error($this->link);
	}
}

?>