<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class scheduler extends CI_Controller
{

    # Rules
    # is_displayed = 2 => Not covered
    # is_displayed = 0 => Covered
    # is_displayed = 1 => To be displayed on tablet
	# By default, tou outlet bizin is_displayed = 2 acoz nanien penkor covered
	# Lerla week 1, is_displayed = 1 pu ban outlet ki bizin paret lr tablet
	# Kuma tablet fini send feedback pu sa ban outlet la (c.a.d is_displayed = 1),
	# Tablet update ban outlet la zot is_displayed fr li vine 0 automatikment.
	# Kuma arrive week 2, bizin re fr tou is_displayed re vine 2 partou kot ena 1
	# Parski tou ban tablet ki pane couvert dan week 1, bizin reset zot pu ki zot pas paret lr week 2
	# Kuma fini sa, bizin re update is_displayed fr li vine is_displayed = 1 pu fr li paret lr tablet.

    function index()
    {

        $this->reset();
       // exit();

        $weekNumber = date("W");

        $year = date("Y");

        echo "Scheduling ..<br/>";
        echo "Current weekno / year : $weekNumber / $year <br/>";

        $sql = " SELECT
                   outlet_code
                   FROM
                   scheduler
                   WHERE
                   weekno = '$weekNumber'
                   AND YEAR = '$year'";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            $outlet_code = $row->outlet_code;

            $sql = "UPDATE `outlet` SET `created` = NOW() + INTERVAL 1 DAY, `is_displayed` = 1 WHERE `outlet_code` = '{$outlet_code}'";
            $result = $this->db->query($sql);
            if ($result) {
                echo "Outlet code: $outlet_code updated";
            }

            // echo  $this->db->last_query();
            echo "<br/>";

        }

    }

    function reset()
    {
        //partou kot ena 1, re fr li vine 2
        $data = array(
            'is_displayed' => 2
        );

        $this->db->where('is_displayed', '1');
        $this->db->update('outlet', $data);

    }
}