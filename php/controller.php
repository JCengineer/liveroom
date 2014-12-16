<?php
	isset($_SESSION) ? NULL : session_start();
	$_SESSION['testing'] =false;

	function liveroom_error_handler($number, $message, $file, $line, $vars){
	    $email = "
	        <p>An error ($number) occurred on line 
	        <strong>$line</strong> and in the <strong>file: $file.</strong> 
	        <p> $message </p>";
	         
	    $email .= "<pre>" . print_r($vars, 1) . "</pre>";
	    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    error_log($email, 1, 'engineer@jclifford.ie', $headers);
	}
	// We should use our custom function to handle errors.
	set_error_handler('liveroom_error_handler');

	function sendEmail($to,$subject,$body,$header,$from){
		if (!isset($header)) { 
			$eol = "\n";
			if (!isset($from)) { $from = "engineer@jclifford.ie"; $fName = "James Clifford"; }
			$headers = "From: \"".$fName."\" <".$from.">\nMIME-Version: 1.0\nContent-Type: text/html; charset=\"UTF-8\"\n";
		}

		if (isset($_SESSION['testing']) && $_SESSION['testing']==true) return true;
		else return mail($to,$subject,$body,$header);
	}

	function randomString($length){
		return substr(sha1(rand()), 0, $length);
	}


?>