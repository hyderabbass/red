<?php
class User_model extends CI_Model {
	function __construct() {
	}
	function verify_account($username, $password) {
		$q = $this->db->where ( 'username', $username )->where ( 'password', SHA1 ( $password ) )->limit ( 1 )->get ( 'users' );
		
		if ($q->num_rows > 0) {
			return $q->row ();
		}
		
		return false;
	}
	function logout() {
		$this->session->sess_destroy ();
	}

}

?>