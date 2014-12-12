<?php
	isset($_SESSION) ? NULL : session_start();

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

?>