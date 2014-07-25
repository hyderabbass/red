<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class monthly_report_c extends CI_Controller
{
public $startdate;// start date of the current month
public $enddate;// end daye of the current month
function __construct(){
    parent::__construct();
    #Get first date and last date of the current month
    $this->load->library('date');
    $this->startdate =  $this->date->get_first_date_of_month();
    $this->enddate =   $this->date->get_last_date_of_month();

   // $this->startdate = '2014-04-07 00:00:01';
  //  $this->enddate =  '2014-04-07 23:59:59';
    $this->load->model('monthly_report_m');
    #Profiler for debugging . need to be disabled in production environment

    if(ENVIRONMENT=='development'){
		$this->output->enable_profiler(TRUE);
    }
}
    # Get monthly report (by default) by channel managers/ region
function index()
{

    $channel_managers =  $this->monthly_report_m->get_channel_managers();
    $channel_managers_x_axis = array();
   // $startdate = '2014-01-01 11:18:00';
   // $enddate = '2014-01-31 11:18:00';
    $total_availability = array();
    $total_cooler = array();
    $total_activation = array();
    $grand_total = array();
    foreach($channel_managers as $key=>$channel_manager){
        $channel_managers_x_axis[] = $channel_manager->name;
        $points_av  =    $this->monthly_report_m->get_total_availability($this->startdate,$this->enddate,$channel_manager->id);
        $points_co  =    $this->monthly_report_m->get_total_cooler($this->startdate,$this->enddate,$channel_manager->id);
        $points_ac =    $this->monthly_report_m->get_total_activation($this->startdate,$this->enddate,$channel_manager->id);
        $total_availability [] = $points_av;
        $total_cooler [] = $points_co;
        $total_activation [] = $points_ac;
        $grand_total[] = $points_av +  $points_co +  $points_ac;
    }

    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - START
    ###################################################################################
    $channel_managers_x_axis[] = "National";

    $total_availability [] =  49;

    $total_cooler [] =  13;

    $total_activation [] = 14;

    $grand_total[] = 49 +  13 +  14;
    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - END
    ###################################################################################


        # Put points as Json without single quotes
    $points_availability_json = str_replace('"',' ',json_encode($total_availability));
    $points_cooler_json =  str_replace('"',' ',json_encode($total_cooler));
    $points_activation_json =  str_replace('"',' ',json_encode($total_activation));
    $grand_total_json = str_replace('"',' ',json_encode($grand_total));
    $channel_managers_x_axis_json = json_encode($channel_managers_x_axis);
    $data ['title'] = 'RED | Monthly Report by Channel Managers';
    $data['x_axis'] = $channel_managers_x_axis_json;
    $data['points_availability_json'] =$points_availability_json;
    $data['points_cooler_json'] =$points_cooler_json;
    $data['points_activation_json'] =$points_activation_json;
    $data['points_total_json'] = $grand_total_json;
    $data['js'] = "$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },credits: {
                enabled: false
            },
            title: {
                text: 'Monthly Report'
            },
            xAxis: {
                categories: ".$channel_managers_x_axis_json."
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Red Performance Evolution'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -70,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                    this.series.name +': '+ this.y +'<br/>'+
                    'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                name: 'Availability(60%)',
                data: ".$points_availability_json."
            }, {
                name: 'Cooler(20%)',
                data: ".$points_cooler_json."
            }, {
                name: 'Activation(20%)',
                data: ".$points_activation_json."
            }, {
                type: 'spline',
                name: 'Total',
                data: ".$grand_total_json.",
                marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: 'white'
              }
          }]
      });
});
";
$this->load->view('monthly_report',$data);
}
public function get_monthly_report_by_outlet_type(){
   //  $this->output->enable_profiler(TRUE);
  $outlets = array(
    'Boutiques',
    'Snacks',
    'Tabagies'
    );
  $outlet_type_ids = array (
    'boutiques' =>'1,3,5',
    'snacks'=>'6,7,8',
    'tabagies'=>'9,10,11'
    );
  $outlet_type_ = '';
  //$startdate = '2014-01-01 11:18:00';
 // $enddate = '2014-01-31 11:18:00';
  $total_availability = array();
  $total_cooler = array();
  $total_activation = array();
  $grand_total = array();
  foreach($outlets as $key=>$outlet){
    $outlets_x_axis[] =$outlet;
   //     var_dump($outlet);
}
foreach($outlet_type_ids as $id){
  $points_av  =    $this->monthly_report_m->get_total_availability_by_outlet_type($this->startdate,$this->enddate,$id);
  $points_co  =    $this->monthly_report_m->get_total_cooler_by_outlet_type($this->startdate,$this->enddate,$id);
  $points_ac =    $this->monthly_report_m->get_total_activation_by_outlet_type($this->startdate,$this->enddate,$id);
  $total_availability [] = $points_av;
  $total_cooler[] = $points_co;
  $total_activation [] = $points_ac;
  $grand_total[] = $points_av +  $points_co +  $points_ac;
   //       var_dump($points_av );
}


    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - START
    ###################################################################################
    $outlets_x_axis[] = "National";

    $total_availability [] =  49;

    $total_cooler [] =  13;

    $total_activation [] = 14;

    $grand_total[] = 49 +  13 +  14;

    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - END
    ###################################################################################
        # Put points as Json without single quotes
$points_availability_json = str_replace('"',' ',json_encode($total_availability));
$points_cooler_json =  str_replace('"',' ',json_encode($total_cooler));
$points_activation_json =  str_replace('"',' ',json_encode($total_activation));
$grand_total_json = str_replace('"',' ',json_encode($grand_total));
$outlets_x_axis_json = json_encode($outlets_x_axis);
  //dd($outlets_x_axis_json);
$data ['title'] = 'RED | Monthly Report by Outlet Type';
$data['x_axis'] = $outlets_x_axis_json;
$data['points_availability_json'] = $points_availability_json;
$data['points_cooler_json'] = $points_cooler_json;
$data['points_activation_json'] = $points_activation_json;
$data['points_total_json'] = $grand_total_json;
$data['js'] = "$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },credits: {
            enabled: false
        },
        title: {
            text: 'Monthly Report by Outlet Type'
        },
        xAxis: {
            categories: ".$outlets_x_axis_json."
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Red Performance Evolution'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -70,
            verticalAlign: 'top',
            y: 20,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+
                this.series.name +': '+ this.y +'<br/>'+
                'Total: '+ this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: 'Availability(60%)',
            data: ".$points_availability_json."
        }, {
            name: 'Cooler(20%)',
            data: ".$points_cooler_json."
        }, {
            name: 'Activation(20%)',
            data: ".$points_activation_json."
        }, {
            type: 'spline',
            name: 'Total',
            data: ". $grand_total_json.",
            marker: {
              lineWidth: 2,
              lineColor: Highcharts.getOptions().colors[3],
              fillColor: 'white'
          }
      }]
  });
});
";
$this->load->view('monthly_report_by_outlet_type',$data);
}


function get_monthly_report_by_outlet_classification(){//e,g classified by Emerald, Gold and Silver
        // X-axis should be Emerald, Gold and silver
        // Y-axis should be points
        // stacks bar chart should be availability, cooler and activation
 $outlets = array(
    'Emerald',
    'Gold',
    'silver'
    );
 $outlet_type_ids = array (
    'emerald' =>'1,6,9',
    'gold'=>'3,7,10',
    'silver'=>'5,8,11'
    );
 $outlet_type_ = '';

  //$startdate = '2014-01-01 11:18:00';
 // $enddate = '2014-01-31 11:18:00';
 $total_availability = array();
 $total_cooler = array();
 $total_activation = array();
 $grand_total = array();
 foreach($outlets as $key=>$outlet){
    $outlets_x_axis[] =$outlet;
   //     var_dump($outlet);
}
foreach($outlet_type_ids as $id){
  $points_av  =    $this->monthly_report_m->get_total_availability_by_outlet_type($this->startdate,$this->enddate,$id);
  $points_co  =    $this->monthly_report_m->get_total_cooler_by_outlet_type($this->startdate,$this->enddate,$id);
  $points_ac =    $this->monthly_report_m->get_total_activation_by_outlet_type($this->startdate,$this->enddate,$id);
  $total_availability [] = $points_av;
  $total_cooler[] = $points_co;
  $total_activation [] = $points_ac;
  $grand_total[] = $points_av +  $points_co +  $points_ac;
   //       var_dump($points_av );
}



    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - START
    ###################################################################################
    $outlets_x_axis[] = "National";

    $total_availability [] =  49;

    $total_cooler [] =  13;

    $total_activation [] = 14;

    $grand_total[] = 49 +  13 +  14;
    ###################################################################################
    # HARDCODE - FOR DEMO ONLY - END
    ###################################################################################

        # Put points as Json without single quotes
$points_availability_json = str_replace('"',' ',json_encode($total_availability));
$points_cooler_json =  str_replace('"',' ',json_encode($total_cooler));
$points_activation_json =  str_replace('"',' ',json_encode($total_activation));
$grand_total_json = str_replace('"',' ',json_encode($grand_total));
$outlets_x_axis_json = json_encode($outlets_x_axis);


  //dd($outlets_x_axis_json);
$data ['title'] = 'RED | Monthly Report by Outlet Type';
$data['x_axis'] = $outlets_x_axis_json;
$data['points_availability_json'] = $points_availability_json;
$data['points_cooler_json'] = $points_cooler_json;
$data['points_activation_json'] = $points_activation_json;
$data['points_total_json'] = $grand_total_json;
$data['js'] = "$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },credits: {
            enabled: false
        },
        title: {
            text: 'Monthly Report by Outlet Type'
        },
        xAxis: {
            categories: ".$outlets_x_axis_json."
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Red Performance Evolution'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -70,
            verticalAlign: 'top',
            y: 20,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.x +'</b><br/>'+
                this.series.name +': '+ this.y +'<br/>'+
                'Total: '+ this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: 'Availability(60%)',
            data: ".$points_availability_json."
        }, {
            name: 'Cooler(20%)',
            data: ".$points_cooler_json."
        }, {
            name: 'Activation(20%)',
            data: ".$points_activation_json."
        }, {
            type: 'spline',
            name: 'Total',
            data: ". $grand_total_json.",
            marker: {
              lineWidth: 2,
              lineColor: Highcharts.getOptions().colors[3],
              fillColor: 'white'
          }
      }]
  });
});
";
$this->load->view('monthly_report_by_outlet_classification',$data);
}


}
