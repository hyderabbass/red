<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perf_evolution_c extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->output->enable_profiler(TRUE);

		$this->load->model('perf_evolution_m');
		$current_week_no  = $this->perf_evolution_m->current_week();
		$x_axis_with_label =  $this->perf_evolution_m->list_previous_week($current_week_no,"WK");
		$x_axis_without_label = $this->perf_evolution_m->list_previous_week($current_week_no);

		$x_axis_with_label = json_encode($x_axis_with_label);//pass json in Highcharts  - X-axis coordinates
		$test = $this->perf_evolution_m->get_previous_week_nos(15);
		//dd($test);

            foreach ($x_axis_without_label as $key => $value) {
                    $points_av  = $this->perf_evolution_m->points_availability("$value","2014");
                    $points_co   = $this->perf_evolution_m->points_cooler("$value","2014");
                    $points_ac = $this->perf_evolution_m->points_activation("$value","2014");
                    $points_availability[] =  $points_av ;
                    $points_cooler[]=  $points_co ;
                    $points_activation[] =  $points_ac ;
                    $points_total[] = $points_av +   $points_co + $points_ac;

            }

        # Put points as Json without single quotes
		$points_availability_json = str_replace('"',' ',json_encode($points_availability));
        $points_cooler_json =  str_replace('"',' ',json_encode($points_cooler));
        $points_activation_json =  str_replace('"',' ',json_encode($points_activation));


        #Make total points and output as json
		$points_total_json =  str_replace('"',' ',json_encode($points_total));


		$data ['title'] = 'Red - Dashboard';

        $data['x_axis_with_label'] =$x_axis_with_label;
        $data['points_availability_json'] =$points_availability_json;
        $data['points_activation_json'] =$points_activation_json;
        $data['points_total_json'] = $points_total_json;


		$data['js'] = "$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },credits: {
            enabled: false
          },
            title: {
                text: 'Average of last 4 weeks'
            },
            xAxis: {
                categories: ".$x_axis_with_label."
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
                data: ".$points_total_json.",
                marker: {
                  lineWidth: 2,
                  lineColor: Highcharts.getOptions().colors[3],
                  fillColor: 'white'
                }
            }]
        });
    });
    ";



		$this->load->view('performance_evolution',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */