<?php
// require_once(dirname(__FILE__)."/EmailTemplate.php");
defined('BASEPATH') OR exit('No direct script access allowed');

class Debat extends CI_Controller {

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
    // $this->load->library('session');
       $this->load->model('Admin_model');
			 if(empty($this->session->userdata('admLogin'))){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if(!empty($this->session->userdata('admLogin')))
				{
					$this->load->view('admin/header');
					$data['debat'] = $this->Admin_model->get_table('debat_db');
					$this->load->view('admin/debat/readDebat', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

		function sortby($verify){
		switch ($verify) {
			case 'verified':
				$this->load->view('admin/header');
				$data['debat'] = $this->Admin_model->sortby(array('status'=>4),'debat_db', 'uid DESC');
				$this->load->view('admin/debat/readDebat', $data);
				$this->load->view('admin/footer');
				break;
			
			case 'unverified':
				$this->load->view('admin/header');
				$data['debat'] = $this->Admin_model->sortby(array('status !='=>'4'),'debat_db', 'uid DESC');
				$this->load->view('admin/debat/readDebat', $data);
				$this->load->view('admin/footer');
				break;
		}
	}

	public function editView($id){
		if(!empty($this->session->userdata('admLogin')))
				{
					$this->load->view('admin/header');
					$data['edit'] = $this->Admin_model->get_data_id('debat_db', $id);
					$this->load->view('admin/debat/editDebat', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function export_excel(){
		$data = array( 'title' => 'Daftar Peserta Debat',
								 'debat' => $this->Admin_model->get_table('debat_db'));
		$this->load->view('admin/debat/debat_excel',$data);
	}

	public function download_data($id){
		force_download('./uploads/debat/'.$id, null);
	}

	public function download_bayar($id){
		force_download('./uploads/debat/'.$id, null);
	}

	public function editDebat($id){
		if(!empty($this->session->userdata('admLogin')))
    {
				$data = array(
					'NAMA_TIM'=> $this->input->post('nama_tim'),
					'ASAL_UNIV' => $this->input->post('asal_instansi'),
					'KETUA' => $this->input->post('nama_ketua'),
					'NIM_KETUA' => $this->input->post('nim_ketua'),
					'ANGGOTA1' => $this->input->post('anggota1'),
					'NIM_A1' => $this->input->post('nim_a1'),
					'ANGGOTA2' => $this->input->post('anggota2'),
					'NIM_A2' => $this->input->post('nim_a2'),
					'STATUS' => $this->input->post('status'),
					'KONTAK' => $this->input->post('kontak'));
				$query = $this->db->where('uid', $id);
				$query = $this->db->update('debat_db', $data);
				if($query)
				{
					$this->session->set_flashdata('suksesdebat', '<div class="col-sm-12 alert alert-success fade in">
						 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 Peserta Debat Berhasil Diupdate</div>');
					   $this->load->library('sendmail');
					if ($this->input->post('status')==4) {
						$email_to = $this->Admin_model->getUserID('user',$id)['email'];
						$this->sendmail->chgStatus($email_to,$this->input->post('nama_tim'));
					}
					redirect ('admin/debat');
				}
				else
				{
					$this->session->set_flashdata('gagaldebat', '<div class="col-sm-12 alert alert-danger fade in">
						 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 Peserta Debat Gagal Diupdate</div>');
					redirect ('admin/debat/editDebat/$id');
				}
		} else
		{
				redirect('admin/dashboard');
		}
	}

}
