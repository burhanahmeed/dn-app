<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcer extends CI_Controller {

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
					//$data['pesan'] = $this->Model_pesan->gettable_sort("pesan", "id_pesan");
					$data['announcer'] = $this->Admin_model->get_table('announcer');
					$this->load->view('admin/header');
					$this->load->view('admin/announcer/readAnnouncer', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createView(){
		if(!empty($this->session->userdata('admLogin')))
				{
					$this->load->view('admin/header');
					$this->load->view('admin/announcer/createAnnouncer');
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createAnnouncer(){
		if(!empty($this->session->userdata('admLogin')))
    {
				$data = array(
					'JENIS'=> $this->input->post('jenis'),
					'DESK'=> $this->input->post('deskripsi'),
					'LINK'=> $this->input->post('link'),
					'DATE'=> date("Y-m-d H:i:s"));

					$query = $this->Admin_model->insert('announcer', $data);

			if($query)
			{
				$this->session->set_flashdata('suksesAnnouncer', '<div class="col-sm-12 alert alert-success fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Announcer Berhasil Disimpan</div>');
				redirect ('admin/announcer');
			}else
			{
				$this->session->set_flashdata('gagalAnnouncer', '<div class="col-sm-12 alert alert-danger fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Announcer Gagal Disimpan</div>');
				redirect ('admin/announcer/createView');
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusAnnouncer($id){
		if(!empty($this->session->userdata('admLogin')))
		{
			$this->Admin_model->delete_data('announcer', $id);
			redirect('admin/announcer');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
