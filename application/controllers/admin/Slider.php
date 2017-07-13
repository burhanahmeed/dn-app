<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
       $this->load->model('Model_slider');
			 if($this->session->userdata('type') != 'admin'){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if($this->session->userdata('akses'))
				{
					$this->load->view('admin/header');
					$data['slider'] = $this->Model_slider->gettable_sort("slider", "id_slider");
					$this->load->view('admin/slider/readSlider', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createView(){
		if($this->session->userdata('akses'))
				{
					$this->load->view('admin/header');
					$this->load->view('admin/slider/createSlider');
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
					$data['edit'] = $this->Model_slider->get_data_id($id);
					$this->load->view('admin/slider/updateSlider', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createSlider(){
		if($this->session->userdata('akses'))
    {
				$target_Path = NULL;
				if ($_FILES['gambar']['name'] != NULL)
				{
						$target_Path = "assets/gambar/slider/";
						$string = basename( $_FILES['gambar']['name'] );
						$string = str_replace(" ","-", $string);
						$target_Path = $target_Path.$string;
				}

			if($target_Path!=NULL){
				$data = array(
					'ID_SLIDER'=> $this->input->post('id_slider'),
					'HEADER1'=> $this->input->post('header1'),
					'HEADER2'=> $this->input->post('header2'),
					'LINK'=> $this->input->post('link'),
					'GAMBAR' => $target_Path,
					'KONTEN' => $this->input->post('konten'));

					$query = $this->Model_slider->insert('slider', $data);
			}

			if($query)
			{
				if ($target_Path != NULL) {
					move_uploaded_file( $_FILES['gambar']['tmp_name'], $target_Path );
				}
				$this->session->set_flashdata('suksesslider', '<div class="col-sm-12 alert alert-success fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Slider Berhasil Disimpan</div>');
				redirect ('admin/slider');
			}else
			{
				$this->session->set_flashdata('gagalslider', '<div class="col-sm-12 alert alert-danger fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Slider Gagal Disimpan</div>');
				redirect ('admin/slider/createView');
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function editSlider($id){
		if($this->session->userdata('akses'))
    {
			$target_Path = NULL;
			if ($_FILES['gambar']['name'] != NULL)
			{
				$target_Path = "assets/gambar/slider/";
				$string = basename( $_FILES['gambar']['name'] );
				$string = str_replace(" ","-", $string);
				$target_Path = $target_Path.$string;
			}
			if ($_FILES['gambar']['name'] == NULL){
				$data = array(
					'HEADER1'=> $this->input->post('header1'),
					'HEADER2'=> $this->input->post('header2'),
					'LINK'=> $this->input->post('link'),
					'KONTEN' => $this->input->post('konten'));

				$query = $this->db->where('id_slider', $id);
				$query = $this->db->update('slider', $data);
				if($query)
				{
					$this->session->set_flashdata('suksesslider', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Slider Berhasil Diupdate</div>');
					redirect ('admin/slider');
				}
				else
				{
					$this->session->set_flashdata('gagalslider', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Slider Gagal Disimpan</div>');
					redirect ('admin/slider/editView/$id');
				}
			}
			if($target_Path!=NULL)
			{
				$data = array(
					'HEADER1'=> $this->input->post('header1'),
					'HEADER2'=> $this->input->post('header2'),
					'LINK'=> $this->input->post('link'),
					'GAMBAR' => $target_Path,
					'KONTEN' => $this->input->post('konten'));

				$query = $this->db->where('id_slider', $id);
				$query = $this->db->update('slider', $data);
				if($query)
				{
					if ($target_Path != NULL) {
						move_uploaded_file( $_FILES['gambar']['tmp_name'], $target_Path );
					}
					$this->session->set_flashdata('suksesslider', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Slider Berhasil Diupdate</div>');
					redirect ('admin/slider');
				}
				else
				{
					$this->session->set_flashdata('gagalslider', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Slider Gagal Disimpan</div>');
					redirect ('admin/slider/editView/$id');
				}
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusSlider($id){
		if($this->session->userdata('akses'))
		{
			$this->Model_slider->delete_data($id);
			redirect('admin/slider');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
