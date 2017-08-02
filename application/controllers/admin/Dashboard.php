<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

   public function __construct() {
   parent::__construct();
       $this->load->model('Admin_model');
       $this->load->library('session');
  }

	public function index()
	{
    $data['notif']="";
		$this->session->sess_destroy();
    $this->load->view('admin/login', $data);
	}

  public function beranda(){
		if(!empty($this->session->userdata('admLogin')))
        {
			$this->load->view('admin/header');
		    $this->load->view('admin/dashboard');
		    $this->load->view('admin/footer');

        }else
        {
            redirect('admin/dashboard');
        }
  }

  public function login(){
    if(isset($_POST['login']))
        {
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil      =   $this->Admin_model->login($username,$password);
            if($hasil['akses']==TRUE)
            {
				$this->session->set_flashdata('sukses', 'Login Berhasil');
				$sess = array(
					'id'=>$hasil['id'],
					'usname'=>$hasil['username']);
				$this->session->set_userdata('admLogin',$sess);
				//var_dump($hasil);die();
                redirect ('admin/dashboard/beranda', $data);
            } else{
                $data['notif'] = "<div class='alert alert-danger fade in'>
			                           <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			                           Login Gagal</div>";
                $this->load->view('admin/login', $data);
            }
        }
  }

	public function logout()
	{
				$this->session->sess_destroy();
				redirect('admin/dashboard');
	}
	function changePassword(){
    	$id = $this->session->userdata('admLogin')['id'];
    	$this->form_validation->set_rules('pass','Password','required|trim|matches[cpass]|min_length[8]');
		$this->form_validation->set_rules('cpass','Confirm Password','required|trim');
    	$data = array(
    		'password'=>md5($this->input->post('pass')));
    
    	if ($this->form_validation->run()) {
    		$this->Admin_model->updateDB($data,'admin', array('id'=>$id));
    		$this->session->set_flashdata('succhg', 'New password saved');
    	}else{
    		$this->session->set_flashdata('errchg',validation_errors());
    	}
    	redirect('admin/dashboard/beranda');
    }

}
