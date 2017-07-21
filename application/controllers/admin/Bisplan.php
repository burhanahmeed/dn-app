<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bisplan extends CI_Controller {

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
					$this->load->view('admin/header');
					$data['bisplan'] = $this->Admin_model->get_table('bisplan_db');
					$this->load->view('admin/bisplan/readBisplan', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function editView($id){
		if($this->session->userdata('akses'))
				{
					$this->load->view('admin/header');
					$data['edit'] = $this->Admin_model->get_data_id('bisplan_db', $id);
					$this->load->view('admin/bisplan/editBisplan', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function export_excel(){
		$data = array( 'title' => 'Daftar Peserta Bisplan',
								 'bisplan' => $this->Admin_model->get_table('bisplan_db'));
		$this->load->view('admin/bisplan/bisplan_excel',$data);
	}

	public function editBisplan($id){
		if($this->session->userdata('akses'))
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
					'SEMIFINAL' => $this->input->post('semifinal'),
					'KONTAK' => $this->input->post('kontak'));
				$query = $this->db->where('uid', $id);
				$query = $this->db->update('bisplan_db', $data);
				if($query)
				{
					$this->session->set_flashdata('suksesbisplan', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Peserta Business Plan Berhasil Diupdate</div>');
					redirect ('admin/bisplan');
				}
				else
				{
					$this->session->set_flashdata('gagalbisplan', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Peserta Business Plan Gagal Diupdate</div>');
					redirect ('admin/bisplan/editBisplan/$id');
				}
		} else
		{
				redirect('admin/dashboard');
		}
	}

}
