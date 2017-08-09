<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kofid extends CI_Controller {

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
			if(empty($this->session->userdata('admLogin'))){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if(!empty($this->session->userdata('admLogin')))
				{
					$this->load->view('admin/header');
					$data['kofid'] = $this->Admin_model->get_table('kofid_db');
					$this->load->view('admin/kofid/readKofid', $data);
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
				$data['cercer'] = $this->Admin_model->sortby(array('status'=>'4'),'kofid_db', 'uid DESC');
				$this->load->view('admin/kofid/readKofid', $data);
				$this->load->view('admin/footer');
				break;
			
			case 'unverified':
				$this->load->view('admin/header');
				$data['cercer'] = $this->Admin_model->sortby(array('status !='=>'4'),'kofid_db', 'uid DESC');
				$this->load->view('admin/kofid/readCercer', $data);
				$this->load->view('admin/footer');
				break;
		}
	}

	public function editView($id){
		if(!empty($this->session->userdata('admLogin')))
				{
					$this->load->view('admin/header');
					$data['edit'] = $this->Admin_model->get_data_id('cercer_db', $id);
					$this->load->view('admin/cercer/editCercer', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function export_excel(){
		$data = array( 'title' => 'Daftar Peserta Film Dokumenter',
								 'kofid' => $this->Admin_model->get_table('kofid_db'));
		$this->load->view('admin/kofid/kofid_excel',$data);
	}

	public function download_data($id){
		force_download('./uploads/cercer/'.$id, null);
	}

	public function download_bayar($id){
		force_download('./uploads/cercer/'.$id, null);
	}

	public function editCercer($id){
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
				$query = $this->db->update('cercer_db', $data);
				if($query)
				{
					$this->session->set_flashdata('suksescercer', '<div class="col-sm-12 alert alert-success fade in">
						 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 Peserta Cerdas Cermat Berhasil Diupdate</div>');
					   $this->load->library('sendmail');
					if ($this->input->post('status')==4) {
						$email_to = $this->Admin_model->getUserID('user',$id)['email'];
						$this->sendmail->chgStatus($email_to,$this->input->post('nama_tim'));
					}
					redirect ('admin/cercer');
				}
				else
				{
					$this->session->set_flashdata('gagalcercer', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Peserta Cerdas Cermat Gagal Diupdate</div>');
					redirect ('admin/cercer/editCercer/$id');
				}
		} else
		{
				redirect('admin/dashboard');
		}
	}

}
