<?php
class MY_Session extends CI_Session {
	function __construct() {
		parent::__construct ();
		
		$session_username = $this->userdata ( 'username' );
		$session_type = $this->userdata ( 'type' );
		
		$current_url = uri_string ();
		if (! $session_username) {
			
			if ($current_url != 'user/login') { // if user is not on login page ..
				if (! isset ( $_POST ['username'] )) { // and if there's no submission on login form ..
				redirect ( 'user/login' );
				}
			}
		}
	}
}
?>