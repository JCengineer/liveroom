<?php


	require_once ('MysqliDb.php');
	$db = new MysqliDb ('localhost', 'root', '', 'liveroom'); //local
	//$db = new MysqliDb ('host', 'username', 'password', 'databaseName');//production

	function loggedIn(){
		if ( isset($_SESSION['user']) ) {
			$user = 'user db_lookup todo';
			return $user;
		} else return false;
	}

	function isLoggingIn(){
		if ( isset( $_POST['login'] ) && isset( $_POST['email'] ) && isset( $_POST['password'] ) ){
			return true;
		} else return false;
	}

	function logIn(){
		if ( isset( $_POST['email'] ) && isset( $_POST['pass'] ) ){
			return 'user log-in todo';
		} else return false;
	}

	function isRegistering(){
		if ( isset( $_POST['register'] ) && isset( $_POST['email'] ) && isset( $_POST['name'] ) ){
			return true;
		} else return false;
	}

	function register(){
		global $db;
		$email = $_POST['email'];
		$name = $_POST['name'];
		$user = $db->where('email',$email)->get('users');

		if ( sizeof( $db->where('email',$email)->get('users') ) == 0 ){
				
			//send email and check

			$data = Array ("name" => $name,
               "email" => $email,
               "account" => 'notactivated'
			);
			$id = $db->insert('users', $data);
			if($id)	return 'user log-in todo';
		} else {
			header("HTTP/1.0 500 Internal Server Error");
			exit( "User already exists" );
		}
	}

	function userOptions($user){
		return 'userOptions todo';
	}

?>