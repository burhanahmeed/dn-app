<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model');
    }

	public function index()
	{
		$this->load->view('peserta/login');
	}

	function do_login(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		$usname = htmlspecialchars($this->input->post('email'));
		$pass = htmlspecialchars($this->input->post('pass'));
		if ($this->form_validation->run()) {
			$cek = $this->Auth_model->cekLogin($usname,$pass);
			if ($cek == TRUE) {
				$getter = $this->Auth_model->getData($usname);
				$sess = array(
					'email'=>$getter[0]->email,
					'id'=>$getter[0]->id,
					'date'=>$getter[0]->date,
					'debat'=>$getter[0]->debat,
					'bisplan'=>$getter[0]->bisplan,
					'cercer'=>$getter[0]->cercer);
				$this->session->set_userdata('login',$sess);
				redirect('root/dashboard');
			}else{
				$this->session->set_flashdata('errLogin','Email or Password are Incorrect');
				redirect('/');
			}
		}else{
			$this->session->set_flashdata('errLogin','Email or Password are Incorrect');
			redirect('/');
		}
	}
	function do_register(){

		$this->load->database();
		$this->form_validation->set_rules('emails','email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pass','Password','required|trim|matches[cpass]|min_length[8]');
		$this->form_validation->set_rules('cpass','Confirm Password','required|trim');
		$this->form_validation->set_message('is_unique', 'Your %s already registered, please use other email');
		$data = array(
			'email'=>htmlspecialchars($this->input->post('emails')),
			'password'=> htmlspecialchars($this->input->post('pass')),
			'date'=> date('Y-m-d H:i:sa'));

		if ($this->form_validation->run()) {
			$this->Auth_model->register($data);
			$this->session->set_flashdata('sucRegis','Succesfully registered, Please Login');
			redirect('/');
		}else{
			$this->session->set_flashdata('errRegis',validation_errors());
			redirect('/');
		}
	}

	function logout(){
		$this->session->unset_userdata('login');
	    // $this->session->session_destroy();
	    redirect('/');
	}
}
