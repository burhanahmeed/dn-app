<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			 if($this->session->userdata('type') != 'admin'){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if($this->session->userdata('akses'))
				{
					//$data['pesan'] = $this->Model_pesan->gettable_sort("pesan", "id_pesan");
					$data['user'] = $this->Admin_model->get_table('user');
					$this->load->view('admin/header');
					$this->load->view('admin/user/readUser', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function export_excel(){
 		$data = array( 'title' => 'Daftar User Diesnat35',
 								 'user' => $this->Admin_model->get_table('user'));
 		$this->load->view('admin/user/user_excel',$data);
 	}

	public function hapusUser($id){
		if($this->session->userdata('akses'))
		{
			$this->Admin_model->delete_data('user', $id);
			redirect('admin/user');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
