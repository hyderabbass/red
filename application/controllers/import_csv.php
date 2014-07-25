<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class import_csv extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {


        $this->load->library('Foo');
        //dd(asset_url().'import_red.csv');
        $result = $this->foo->parse_file(asset_url() . 'import_red.csv');

        foreach ($result as $key => $value) {

            $outlet_code = $result[$key]['outlet_code'];
            $outlet_name = $result[$key]['outlet_name'];
            $trade_name_1 = $result[$key]['trade_name_1'];
            $trade_name_2 = $result[$key]['Trade_name_2'];
            $address_1 = $result[$key]['address_1'];
            $address_2 = $result[$key]['address_2'];
            $tel_1 = $result[$key]['tel_1'];
            $tel_2 = $result[$key]['tel_2'];
            $sub_trade_channel = $result[$key]['sub_trade_channel'];
            $outlet_type = $result[$key]['outlet_type'];
            $outlet_category = $result[$key]['outlet_category'];
            $channel_manager = trim(substr($result[$key]['channel_manager'], 4));
            $channel_developer = trim(substr($result[$key]['channel_developer'], 3));
           $channel_managerid =  $this->get_channel_manager_id($channel_manager);
   // dd($channel_managerid);
            $outlet_type = $result[$key]['outlet_type'];
            $outlet_category = $result[$key]['outlet_category'];
            $categoryid = $this->get_category_id($outlet_type, $outlet_category);
         //   var_dump($categoryid);
          //  dd();
            //  $outlet_exists = $this->db->get_where('outlet', array('outlet_code' => $outlet_code));
            $outlet_exists = $this->db
                ->where('outlet_code', $outlet_code)
                ->count_all_results('outlet');

            $this->db->flush_cache();

            if ($outlet_exists == 0) { //save to insert outlet
                #Outlet details
                $outlet_details = array(
                    'categoryid' => $categoryid,
                    'address' => $outlet_name,
                    'outlet_code' => $outlet_code,
                    'outletname' => $outlet_name,
                    'tradename1' => $trade_name_1,
                    'tradename2' => $trade_name_2,
                    'address1' => $address_1,
                    'address2' => $address_2,
                    'tel1' => $tel_1,
                    'tel2' => $tel_2,
                    'subtradechannel' => $sub_trade_channel

                );
                /*
                #Manager details
                $manager_details = array(
                    'name' => $channel_manager
                );
                if (!$this->check_duplicate_manager($channel_manager)) {
                    $this->db->insert('channel_manager', $manager_details);
                }

                $this->db->flush_cache();

                #Developer details
                $channel_manager_id = $this->db->insert_id();
                $developer_details = array(
                    'channel_manager_id' => $channel_manager_id,
                    'name' => $channel_developer
                );

                if (!$this->check_duplicate_developer($channel_developer)) {
                    $this->db->insert('channel_developer', $developer_details);
                }
                $this->db->flush_cache();
*/

                $this->db->insert('outlet', $outlet_details);
                $this->db->flush_cache();
            } elseif ($outlet_exists == 1) {
                echo "outlet $outlet_code already exists. Channel manager id is  $channel_managerid <br/>";

                $data = array(
                    'channel_manager_id' => $channel_managerid
                );

                $this->db->where('outlet_code', $outlet_code);
                $this->db->update('outlet', $data);

            } else {
                echo "Ena plis ki 1 pou outlet_code = $outlet_code <br/>";
            }


            //  dd();
        }


    }


    function check_duplicate_manager($name)
    {
        $outlet_exists = $this->db
            ->where('name', $name)
            ->count_all_results('channel_manager');
        if ($outlet_exists == '0') {
            return false; //safe for insert
        } else {
            return true; //veu dir li dup
        }
    }

    function check_duplicate_developer($name)
    {
        $outlet_exists = $this->db
            ->where('name', $name)
            ->count_all_results('channel_developer');

        if ($outlet_exists == '0') {
            return false; //safe for insert
        } else {
            return true; //veu dir li dup
        }

    }

    function get_category_id($outlet_type, $outlet_category)
    {
      //  echo "For $outlet_type, $outlet_category";
        /*
         *  Boutique	Emerald
            Boutique	Gold
            Boutique	Silver

            Snack	Emerald
            Snack	Gold
            Snack	Silver

            Tabagie	Emerald
            Tabagie	Gold
            Tabagie	Silver


        */
        $category = 0; //initialize this shitty var
        if ($outlet_type == 'Boutique' && $outlet_category == 'Emerald') {
            $categoryid = 1;
        } else if ($outlet_type == 'Boutique' && $outlet_category == 'Gold') {
            $categoryid = 3;
        } else if ($outlet_type == 'Boutique' && $outlet_category == 'Silver') {
            $categoryid = 5;
        } else if ($outlet_type == 'Snack' && $outlet_category == 'Emerald') {
            $categoryid = 6;
        } else if ($outlet_type == 'Snack' && $outlet_category == 'Gold') {
            $categoryid = 7;
        } else if ($outlet_type == 'Snack' && $outlet_category == 'Silver') {
            $categoryid = 8;
        } else if ($outlet_type == 'Tabagie' && $outlet_category == 'Emerald') {
            $categoryid = 9;
        } else if ($outlet_type == 'Tabagie' && $outlet_category == 'Gold') {
            $categoryid = 10;
        } else if ($outlet_type == 'Tabagie' && $outlet_category == 'Silver') {
            $categoryid = 11;
        } else {
            $categoryid = 0;
        }
        return $categoryid;

        //  echo "categoryid =  $categoryid ";
        //  dd();
    }



    function get_channel_manager_id($name){
        $this->db->select('id');
        $this->db->where('name', $name);
        $query = $this->db->get('channel_manager');
//echo $this->db->last_query();

        foreach ($query->result() as $row)
        {
            return $row->id;
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */