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
			$string = randomString('60');
			$data = Array ("name" => $name,
	           "email" => $email,
	           "account" => 'notactivated',
	           "created" => Date('Y-M-d h:m:s'),
	           "string" => $string
			);
			$id = $db->insert('users', $data);

			if($id){
				$body = $name."<br>Welcome to the liveroom!<br><br>".
						"To active your account, click on the link below<br><br>".
						"<b><a href='www.jclifford.ie/liveroom/index.php?activating=true&user=".$id."&str=".$string.">Activate</a><b><br><br>".
						"Thank you,<br>James Clifford";
				$mailSent = sendEmail($email,"New LiveRoom User - Activate your account",$body);
				if ($mailSent) return true;
				else {
					header("HTTP/1.0 500 Internal Server Error");
					exit( "Email address not valid." );
				} 
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				exit( "Database connection failed." );
			}
		} else {
			header("HTTP/1.0 500 Internal Server Error");
			exit( "User already exists." );
		}
	}

	function isActivating(){
		if ( isset( $_POST['activate'] ) && isset( $_POST['user'] ) && isset( $_POST['string'] ) ){
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
	           "account" => 'notactivated',
	           "created" => Date('Y-M-d h:m:s')
			);
			$id = $db->insert('users', $data);

			if($id){	
				$body = $name."<br>Welcome to the liveroom!<br><br>".
						"To active your account, click on the link below<br><br>".
						"<b><a href='www.jclifford.ie/liveroom/index.php?activating=true&user=".$id."&str=".randomString('20').">Activate</a><b><br><br>".
						"Thank you,<br>".
						"James Clifford";
				$mailSent = sendEmail($email,"New LiveRoom User - Activate your account",$body);
				if ($mailSent) return true;
				else {
					header("HTTP/1.0 500 Internal Server Error");
					exit( "Email address not valid." );
				} 
			} else {
				header("HTTP/1.0 500 Internal Server Error");
				exit( "Database connection failed." );
			}
		} else {
			header("HTTP/1.0 500 Internal Server Error");
			exit( "User already exists." );
		}
	}

	function userOptions($user){
		return 'userOptions todo';
	}

?>