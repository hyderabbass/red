<?php
class perf_evolution_m extends CI_Model {
	function __construct() {
	}
# Get current week no
	function current_week(){
		$weekno = $this->db->query('SELECT WEEK(NOW()) as week_no')->result();
		$week_no = $weekno['0']->week_no;
		return $week_no;
		//$this->list_previous_week($week_no);
		
	}
# Generate week no on x-axis 
	function list_previous_week($current_week_no,$alias=NULL){
		
		$x_axis_arr = array();
		if($current_week_no>=12){
			$limit = $current_week_no-12;
		}else{
			$limit = 0;
		}
		for ($i = $current_week_no; $i> $limit; $i--) {
			if(is_null($alias)){// si x-axis bizin zis numeric
				$x_axis_arr[] =  $i;
			}else{
				$x_axis_arr[] = $i;
			}
		}
		sort($x_axis_arr, SORT_NATURAL | SORT_FLAG_CASE);
   			if(!is_null($alias)){//si en cas x-axis bizin WK1, WK2, WK3 etc
   				foreach ($x_axis_arr as $key => $value) {
   					$x_axis_arr_new[] = "$alias". $value;
   				}
   				return $x_axis_arr_new;
   			}
   			return $x_axis_arr;
   		}
# Get total Points per week for Availability - Global
public function points_availability($weekno,$year){// e.g 11,2014
	$sql ="SELECT
	productrecord.weekno,
	Sum(product.point_received) AS point_received_per_week,
	productrecord.`status`
	FROM
	productrecord ,
	product
	WHERE
	productrecord.weekno IN  (".$this->get_previous_week_nos($weekno).") 
	AND
	productrecord.productid = product.productid
	AND product.is_deleted = '0'
	AND year = '$year'
	GROUP BY weekno";
	$record = $this->db->query($sql)->result();
	if(empty($record)){
		return "0";
	}
	
	return $record['0']->point_received_per_week;
}
# Get total Points per week for Cooler - Global
public function points_cooler($weekno,$year){// e.g 11,2014
	$sql ="SELECT
	coolerrecord.weekno,
	SUM(cooler.points) as   point_received_per_week
	FROM
	cooler ,
	coolerrecord
	WHERE
	cooler.coolerid = coolerrecord.coolerid
	AND 
	coolerrecord.weekno IN (".$this->get_previous_week_nos($weekno).") 
	AND cooler.is_deleted = '0'
	AND year = '$year'
	GROUP BY weekno";
	$record = $this->db->query($sql)->result();
		//var_dump($record);
	if(empty($record)){
		return "0";
	}
	
	return $record['0']->point_received_per_week;
}
# Get total Points per week for Activation - Global
public function points_activation($weekno,$year){// e.g 11,2014
	$sql ="SELECT
	activationrecord.weekno,
	SUM(activation.points) as   point_received_per_week
	FROM
	activation ,
	activationrecord
	WHERE
	activation.activationid = activationrecord.activationid
	AND activationrecord.weekno IN (".$this->get_previous_week_nos($weekno).") 
	AND activation.is_deleted = '0'
	AND year = '$year'
	GROUP BY weekno";
	$record = $this->db->query($sql)->result();
	if(empty($record)){
		return "0";
	}
	
	return $record['0']->point_received_per_week;
}
public function get_previous_week_nos($weekno){// if you pass week 5, you get => 1,2,3,4
	if($weekno<5){
		return "1,2,3,4";
	}else{
		
		$limit = $weekno-5 ;
		$prev_week = array();
		for ($i = $weekno-1; $i> $limit; $i--) {
			$prev_week[] =  $i;
		}
		sort($prev_week);
		return implode(',',$prev_week);
	}
}
}

?>