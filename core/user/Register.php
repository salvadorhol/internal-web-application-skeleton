<?php
class Register {

	private $data = null;

	public function load($data){
		$this->data = $data;
	}

	public function register(){

		//check if user already exist
		$data = $this->checkExist();

		//$data will be 0 if no existing user was found so we can about inserting new user.
		if(sizeof($data) == 0){

			$conn = new sConnect();
			$conn->connect();
			$conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
			@$conn->bind( array("ss", $this->data->email, Util::hash($this->data->password)) );
			$conn->executeStmt();
			$conn->close();
		} else return "duplicate";
	}

	public function checkExist(){
		$conn = new SConnect();
		$conn->connect();
		$conn->prepare("SELECT * FROM users WHERE email = ?");
		@$conn->bind(array("s", $this->data->email));
		$conn->executeStmt();

		$data = $conn->getResult();
		$conn->close();

		return $data;
	}
}

?>