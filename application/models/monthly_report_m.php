<?php
class monthly_report_m extends CI_Model
{
    function __construct()
    {
    }
// Get channel managers name for x-axis
    function get_channel_managers()
    {
        $sql = "SELECT
        channel_manager.id,
        channel_manager.`name`
        FROM
        channel_manager";
        $channel_managers = $this->db->query($sql)->result();
        return $channel_managers ;
    }
// Calculate the total no of availability points for a specific channel manager
    function get_total_availability($startdate,$enddate,$channelmanagerid){



        $sql = "SELECT
        productrecord.productrecordid,
        channel_manager.id,
        channel_manager.`name`,
        outlet.outletid,
        outlet.address,
        outlet.categoryid,
        outlet.outlet_code,
        productrecord.productid,
        productrecord.date,
        productrecord.`status`,
        productrecord.expiry,
        productrecord.weekno,
        productrecord.`year`,
        SUM(product.point_received) as total_points,
        product.volume,
        product.type
        FROM
        channel_manager,
        outlet,
        productrecord,
        product
        WHERE
        outlet.channel_manager_id = channel_manager.id
        AND outlet.is_deleted = 0
        AND productrecord.outletid = outlet.outletid
        AND product.productid = productrecord.productid
        AND productrecord.date BETWEEN '$startdate'
        AND '$enddate'
        AND channel_manager.id = '$channelmanagerid'
        AND productrecord.`status` = 1
        GROUP BY outletid";
        $total_availability = $this->db->query($sql)->result();
        $data = array ();
        foreach ($total_availability as $key => $details) {
          $data[$details->outletid] = $details->total_points - $this->check_for_expiry_products($startdate,$enddate,$details->outletid);
      }

      $average = $this->get_average($data);
      return  $average;
        /*
        $sql = "SELECT
        AVG(total_points) as average
        FROM
        (SELECT
            productrecord.productrecordid,
            channel_manager.id,
            channel_manager.`name`,
            outlet.outletid,
            outlet.address,
            outlet.categoryid,
            outlet.outlet_code,
            productrecord.productid,
            productrecord.date,
            productrecord.`status`,
            productrecord.expiry,
            productrecord.weekno,
            productrecord.`year`,
            SUM(product.point_received) as total_points,
            product.volume,
            product.type
            FROM
            channel_manager,
            outlet,
            productrecord,
            product
            WHERE
            outlet.channel_manager_id = channel_manager.id
            AND outlet.is_deleted = 0
            AND productrecord.outletid = outlet.outletid
            AND product.productid = productrecord.productid
            AND productrecord.date BETWEEN '$startdate'
            AND '$enddate'
            AND channel_manager.id = '$channelmanagerid'
            AND productrecord.`status` = 1
            GROUP BY outletid
            ) AS t1";
$total_availability = $this->db->query($sql)->result();
if(empty($total_availability)){
    return 0;
}
return   $total_availability['0']->average;
*/
}
// Calculate the total no of cooler points  for a specific channel manager
function get_total_cooler($startdate,$enddate,$channelmanagerid){




    $sql = "SELECT
    AVG(total_points) as average
    FROM
    (SELECT
        channel_manager.id,
        channel_manager.`name`,
        outlet.categoryid,
        outlet.outlet_code,
        outlet.address,
        outlet.outletid,
        coolerrecord.coolerid,

        coolerrecord.`status`,
        coolerrecord.date,
        SUM(cooler.points) as total_points
        FROM
        channel_manager ,
        outlet ,
        coolerrecord ,
        cooler
        WHERE
        channel_manager.id = outlet.channel_manager_id AND
        coolerrecord.outletid = outlet.outletid AND
        coolerrecord.`status` = '1' AND
        cooler.coolerid = coolerrecord.coolerid
        AND  coolerrecord.date between '$startdate' AND '$enddate'
        AND channel_manager.id = '$channelmanagerid'
        GROUP BY     coolerrecord.outletid
        ) AS t1";
$total_cooler = $this->db->query($sql)->result();
if(empty($total_cooler)){
    return 0;
}
return   $total_cooler['0']->average;
}
// Calculate the total no of activation points  for a specific channel manager
function get_total_activation($startdate,$enddate,$channelmanagerid){
    $sql = "SELECT
    AVG(total_points) as average
    FROM
    (SELECT
        channel_manager.id,
        channel_manager.`name`,
        outlet.categoryid,
        outlet.outlet_code,
        outlet.address,
        outlet.outletid,
        SUM(activation.points) as total_points,
        activationrecord.date,
        activationrecord.activationid,
        activationrecord.`status`,
        activationrecord.weekno,
        activationrecord.`year`
        FROM
        channel_manager ,
        outlet ,
        activation ,
        activationrecord
        WHERE
        channel_manager.id = outlet.channel_manager_id AND
        channel_manager.id = '$channelmanagerid' AND
        activation.activationid = activationrecord.activationid AND
        activationrecord.outletid = outlet.outletid AND
        activationrecord.`status` = 1 AND
        date between '$startdate' AND '$enddate'
        GROUP BY outlet.outletid
        ) AS t1";
$total_activation = $this->db->query($sql)->result();
if(empty($total_activation)){
    return 0;
}
return   $total_activation['0']->average;
}
// Total points for availability by Emerald, Gold or Silver
    /*
    * Emerald : 1,6,9
    * Gold  : 1,7,10
    * Silver : 5,8,11
    *
    */
    function get_total_availability_by_outlet_type($startdate,$enddate,$categoryid){


                $sql = "SELECT
            productrecord.productrecordid,
            channel_manager.id,
            channel_manager.`name`,
            outlet.outletid,
            outlet.address,
            outlet.categoryid,
            outlet.outlet_code,
            productrecord.productid,
            productrecord.date,
            productrecord.`status`,
            productrecord.expiry,
            productrecord.weekno,
            productrecord.`year`,

            SUM(product.point_received) as total_points,
            product.volume,
            product.type
            FROM
            channel_manager,
            outlet,
            productrecord,
            product
            WHERE
            outlet.channel_manager_id = channel_manager.id
            AND outlet.is_deleted = 0
            AND productrecord.outletid = outlet.outletid
            AND product.productid = productrecord.productid
            AND productrecord.date BETWEEN '$startdate'
            AND '$enddate'

            AND productrecord.`status` = 1
            AND outlet.categoryid in ($categoryid) 
            GROUP BY outlet.outletid";
        $total_availability = $this->db->query($sql)->result();
        $data = array ();
        foreach ($total_availability as $key => $details) {
          $data[$details->outletid] = $details->total_points - $this->check_for_expiry_products($startdate,$enddate,$details->outletid);
      }

      $average = $this->get_average($data);
      return  $average;

      /*
        $sql = "SELECT
        AVG(total_points) as average
        FROM
        (
            SELECT
            productrecord.productrecordid,
            channel_manager.id,
            channel_manager.`name`,
            outlet.outletid,
            outlet.address,
            outlet.categoryid,
            outlet.outlet_code,
            productrecord.productid,
            productrecord.date,
            productrecord.`status`,
            productrecord.expiry,
            productrecord.weekno,
            productrecord.`year`,

            SUM(product.point_received) as total_points,
            product.volume,
            product.type
            FROM
            channel_manager,
            outlet,
            productrecord,
            product
            WHERE
            outlet.channel_manager_id = channel_manager.id
            AND outlet.is_deleted = 0
            AND productrecord.outletid = outlet.outletid
            AND product.productid = productrecord.productid
            AND productrecord.date BETWEEN '$startdate'
            AND '$enddate'

            AND productrecord.`status` = 1
            AND outlet.categoryid in ($categoryid) 
            GROUP BY outlet.outletid
            ) AS t1";
$total_availability = $this->db->query($sql)->result();
if(empty($total_availability)){
    return 0;
}
return   $total_availability['0']->average;
*/
}
    // Total points for cooler by Emerald, Gold or Silver Up to you to choose!
    /*
    * Emerald : 1,6,9
    * Gold  : 1,7,10
    * Silver : 5,8,11
    *
    */
    function get_total_cooler_by_outlet_type($startdate,$enddate,$categoryid){
        $sql = "SELECT
        AVG(total_points) as average
        FROM
        (
            SELECT
            channel_manager.id,
            channel_manager.`name`,
            outlet.categoryid,
            outlet.outlet_code,
            outlet.address,
            outlet.outletid,
            coolerrecord.coolerid,

            coolerrecord.`status`,
            coolerrecord.date,
            SUM(cooler.points) as total_points
            FROM
            channel_manager ,
            outlet ,
            coolerrecord ,
            cooler
            WHERE
            channel_manager.id = outlet.channel_manager_id AND
            coolerrecord.outletid = outlet.outletid AND
            coolerrecord.`status` = '1' AND
            cooler.coolerid = coolerrecord.coolerid
            AND  coolerrecord.date between '$startdate' AND '$enddate'

            AND outlet.categoryid IN ($categoryid)
            GROUP BY outlet.outletid
            ) AS t1
";
$total_cooler = $this->db->query($sql)->result();
if(empty($total_cooler)){
    return 0;
}
return   $total_cooler['0']->average;
}
    // Total points for activation by Emerald, Gold or Silver Up to you to choose!
    /*
    * Emerald : 1,6,9
    * Gold  : 1,7,10
    * Silver : 5,8,11
    *
    */
    function get_total_activation_by_outlet_type($startdate,$enddate,$categoryid){
        $sql = "SELECT
        AVG(total_points) AS average
        FROM
        (
            SELECT
            channel_manager.id,
            channel_manager.`name`,
            outlet.categoryid,
            outlet.outlet_code,
            outlet.address,
            outlet.outletid,
            SUM(activation.points) as total_points,
            activationrecord.date,
            activationrecord.activationid,
            activationrecord.`status`,
            activationrecord.weekno,
            activationrecord.`year`
            FROM
            channel_manager ,
            outlet ,
            activation ,
            activationrecord
            WHERE
            channel_manager.id = outlet.channel_manager_id AND
            activationrecord.`status` = 1 AND
            activation.activationid = activationrecord.activationid AND
            activationrecord.outletid = outlet.outletid AND
            date between '$startdate' AND '$enddate'
            AND outlet.categoryid IN ($categoryid)
            GROUP BY
            outlet.outletid
            ) AS t1
";
$total_activation = $this->db->query($sql)->result();
if(empty($total_activation)){
    return 0;
}
return   $total_activation['0']->average;
}



function get_average($points_arr){

    $num = @count($points_arr);

    $sum = @array_sum($points_arr);
    $average = @($sum / $num);
    return  $average;

}
function check_for_expiry_products($startdate,$enddate,$outletid){
    $sql = "SELECT
    productrecord.productrecordid,
    productrecord.date,
    productrecord.outletid,
    productrecord.productid,
    productrecord.`status`,
    productrecord.expiry,
    productrecord.weekno,
    productrecord.`year`
    FROM
    productrecord
    WHERE productrecord.date BETWEEN '$startdate'
    AND '$enddate'
    AND productrecord.`expiry` = 0
    AND productrecord.outletid = '$outletid'";

    $query = $this->db->query( $sql);

    $num  =  $query->num_rows(); 
    if($num!=0){
            $points_to_remove = 5;
    }else{
         $points_to_remove = 0;
    }

    return $points_to_remove;
}


}