<?php

	require_once ('MysqliDb.php');
	$db = new MysqliDb ('localhost', $user, $password, $env=='jclifford'?'visilitc_liveroom':'liveroom');
	
	function loggedIn(){
		if ( isset($_SESSION['user']) ) {
			$user = 'user db_lookup todo';
			return $user;
		} else return false;
	}

	function isLoggingIn(){
		if ( isset( $_POST['login'] ) && isset( $_POST['email'] ) && isset( $_POST['p'] ) ){
			return true;
		} else return false;
	}

	function logIn(){
		$email = $_POST['email'];
		$password = $_POST['p'];

		return 'user log-in todo '.$email;
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
	           "password" => $string
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
		if ( isset( $_GET['activate'] ) && isset( $_GET['user'] ) && isset( $_GET['str'] ) ){
			return true;
		} else return false;
	}

	function getActivate(){
		global $db;
		$userId = $_GET['user'];
		$string = $_GET['str'];
		$user = $db->where('id',$userId)->get('users')[0];
		if ( $user['account'] == 'notactivated' ){
			if ( $user['password'] == $string ){
				return "<div id='activate'>
							<h2>Activate your account</h2>
							<input id='passwordUserAccount' type='password' placeholder='Password'></input><br>
							<input id='confirmPasswordUserAccount' type='password' placeholder='Confirm Password'></input><br>
							<button id='activateUserAccount' data-userid='$userId'>Activate</button><br>
							<h3 id='messageActivateUserAccount'><h3>
						</div>";
			} else {
				return "<div id='activate'>
							<h2 style='color:red;'>Invalid user activation string.</h2>
							<a href='index.php'><button>Log in</button></a>
						</div>";
			}
		} else {
			return "<div id='activate'>
						<h2 style='color:red;'>User already activated.</h2>
						<a href='index.php'><button>Log in</button></a>
					</div>" ;
		}
	}

	function isActivated(){
		if ( isset( $_POST['activated'] ) && isset( $_POST['p'] ) && isset( $_POST['user'] ) ){
			return true;
		} else return false;
	}

	function postActivate(){
		global $db;
		$p = $_POST['p'];
		$userId = $_POST['user'];
		//validation done client side
		$password = sha1($p);
		$user = $db->where('id',$userId)->get('users')[0];
		if ( $user['account'] == 'notactivated' ){
			
			$data = array('password' => $password, 'account' => 'free' );
			$id =$db->where('id',$userId)->update('users', $data);
			return "Activated";
			
		} else {
			header("HTTP/1.0 500 Internal Server Error");
			exit( "User already activated." );
		}
	}

	

?>