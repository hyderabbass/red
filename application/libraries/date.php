<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class date {

	function get_first_date_of_month(){
		$first_day_this_month = date('Y-m-01 00:00:00'); 
		return $first_day_this_month;
	}


	function get_last_date_of_month(){
		$last_day_this_month = date('Y-m-t 23:59:59'); 
		return $last_day_this_month;
	}


}