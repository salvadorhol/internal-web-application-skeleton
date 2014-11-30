<?php

class Login{
	private $data = null;

	public function load($data){
		$this->data = $data;
	}

	public function getSession(){
		session_start();

		$data = array(
			"email" 	=> 	$_SESSION['email'],
			"access" 	=>	$_SESSION['access']
		);

		return $data;
	}

	public function logout(){
		session_start();
		unset($_SESSION['access']);
		unset($_SESSION['email']);
		session_destroy();

		return "session destroyed!";
	}

	public function login(){
		//first check to see if email is on database
		$conn = new sConnect();
		$conn->connect();
		$conn->prepare("SELECT * FROM users WHERE email = ?");
		@$conn->bind( array("s", $this->data->email) );
		$conn->executeStmt();
		$data = $conn->getResult();

		//if it is, then proceed to selecting where email and password match
		if(Sizeof($data) == 1){
			$conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
			@$conn->bind( array("ss", $this->data->email, Util::hash($this->data->password) ));
			$conn->executeStmt();
			$data = $conn->getResult();

			//create php user session if select email and password returns a match
			if(Sizeof($data) == 1){
				session_start();
				$_SESSION['email'] = $data[0]->email;
				$_SESSION['access'] = $data[0]->access;

				$result = "Successfully logged in!";
			} 
			//password does not match
			else {
				$result = "Password no match";
			}
		} 
		//else let front end know that email is not in db.
		else if(Sizeof($data) == 0) $result = "Email not found";

		$conn->close();

		return $result;
	}

}

?>