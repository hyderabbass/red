<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		echo "Hello World";
		//$this->load->view('welcome_message');
	}
	function login() {
		$data['error'] = 0;
		if(isset($_POST['username'])){
			$this->load->model('User_model');
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$user = $this->User_model->verify_account($username,$password);
			
			if(!$user){
				$this->session->set_flashdata('errors', "Invalid Username or Password");
				
				}else{//si ena n match dan DB
					//dd($user->type);
					$this->session->set_userdata('username',$user->username);
					$this->session->set_userdata('type',$user->type);
					redirect('dashboard');
					//dd($user);
				}
			}
			$message ['title'] = 'Login to Red Performance';
			$this->load->view ( 'login',$message);
		}
		public function logout() {
			$logout = $this->session->sess_destroy ();
			redirect ( 'user/login' );
		}
	}
	?>