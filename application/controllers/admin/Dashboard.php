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
  }

	public function index()
	{
    $data['notif']="";
		$this->session->sess_destroy();
    $this->load->view('admin/login', $data);
	}

  public function beranda(){
		if($this->session->userdata('akses'))
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
								$this->session->set_userdata($hasil);
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

}
