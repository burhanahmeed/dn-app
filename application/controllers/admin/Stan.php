<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stan extends CI_Controller {

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
       $this->load->model('Model_stan');
			 if($this->session->userdata('type') != 'admin'){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if($this->session->userdata('akses'))
				{
					$this->load->view('admin/header');
					$data['stan'] = $this->Model_stan->gettable_sort("stan", "id_stan");
					$this->load->view('admin/stan/readStan', $data);
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
					$this->load->view('admin/stan/createStan');
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
					$data['edit'] = $this->Model_stan->get_data_id($id);
					$this->load->view('admin/stan/updateStan', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createStan(){
		if($this->session->userdata('akses'))
    {
			$target_Path1 = NULL;
			$target_Path2 = NULL;
			$target_Path3 = NULL;
			if ($_FILES['gambar1']['name'] != NULL)
			{
					$target_Path1 = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar1']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path1 = $target_Path1.$string;
			}
			if ($_FILES['gambar2']['name'] != NULL)
			{
					$target_Path2 = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar2']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path2 = $target_Path2.$string;
			}
			if ($_FILES['gambar3']['name'] != NULL)
			{
					$target_Path3 = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar3']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path3 = $target_Path3.$string;
			}
		if($target_Path1!=NULL){
			$data = array(
				'ID_STAN'=> $this->input->post('id_stan'),
				'NAMA_STAN'=> $this->input->post('nama_stan'),
				'GMAP'=> $this->input->post('gmap'),
				'GAMBAR1' => $target_Path1,
				'GAMBAR2' => $target_Path2,
				'GAMBAR3' => $target_Path3,
				'KONTEN' => $this->input->post('konten'));

				$query = $this->Model_stan->insert('stan', $data);
		}

		if($query)
		{
			if ($target_Path1 != NULL) {
				move_uploaded_file( $_FILES['gambar1']['tmp_name'], $target_Path1 );
			}
			if ($target_Path2 != NULL) {
				move_uploaded_file( $_FILES['gambar2']['tmp_name'], $target_Path2 );
			}
			if ($target_Path3 != NULL) {
				move_uploaded_file( $_FILES['gambar3']['tmp_name'], $target_Path3 );
			}
			$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
											 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											 Stan Berhasil Disimpan</div>');
			redirect ('admin/stan');
		}else
		{
			$this->session->set_flashdata('gagalstan', '<div class="col-sm-12 alert alert-danger fade in">
											 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											 Stan Gagal Disimpan</div>');
			redirect ('admin/stan/createView');
		}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function editStan($id){
		if($this->session->userdata('akses'))
		{
				$data = array(
					'NAMA_STAN'=> $this->input->post('nama_stan'),
					'GMAP'=> $this->input->post('gmap'),
					'KONTEN' => $this->input->post('konten'));

				$query = $this->db->where('id_stan', $id);
				$query = $this->db->update('stan', $data);
				if($query)
				{
					$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Stan Berhasil Diupdate</div>');
					redirect ('admin/stan');
				}
				else
				{
					$this->session->set_flashdata('gagalstan', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Stan Gagal Disimpan</div>');
					redirect ('admin/stan/editView/$id');
				}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function gambar1($id){
		if($this->session->userdata('akses'))
		{
			$target_Path = NULL;
			if ($_FILES['gambar1']['name'] != NULL)
			{
					$target_Path = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar1']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path = $target_Path.$string;
			}
			if($target_Path!==NULL)
			{
				$data = array(
					'GAMBAR1' => $target_Path);

				$query = $this->db->where('id_stan', $id);
				$query = $this->db->update('stan', $data);
				if($query)
				{
					if ($target_Path != NULL) {
						move_uploaded_file( $_FILES['gambar1']['tmp_name'], $target_Path );
					}
					$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar1 Berhasil Diupdate</div>');
					redirect ('admin/stan/editView/'.$id);
				}
				else
				{
					$this->session->set_flashdata('gagalstan', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar1 Gagal Diupdate</div>');
					redirect ('admin/stan/editView/$id');
				}
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusgambar1($id){
		if($this->session->userdata('akses'))
		{
			$data = array(
				'GAMBAR1' => 'assets/gambar/stan/no_image.png');

			$query = $this->db->where('id_stan', $id);
			$query = $this->db->update('stan', $data);
			$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
											 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											 Gambar1 Berhasil Dihapus</div>');
			redirect ('admin/stan/editView/'.$id);
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function gambar2($id){
		if($this->session->userdata('akses'))
		{
			$target_Path = NULL;
			if ($_FILES['gambar2']['name'] != NULL)
			{
					$target_Path = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar2']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path = $target_Path.$string;
			}
			if($target_Path!==NULL)
			{
				$data = array(
					'GAMBAR2' => $target_Path);

				$query = $this->db->where('id_stan', $id);
				$query = $this->db->update('stan', $data);
				if($query)
				{
					if ($target_Path != NULL) {
						move_uploaded_file( $_FILES['gambar2']['tmp_name'], $target_Path );
					}
					$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar2 Berhasil Diupdate</div>');
					redirect ('admin/stan/editView/'.$id);
				}
				else
				{
					$this->session->set_flashdata('gagalstan', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar2 Gagal Diupdate</div>');
					redirect ('admin/stan/editView/$id');
				}
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusgambar2($id){
		if($this->session->userdata('akses'))
		{
			$data = array(
				'GAMBAR2' => 'assets/gambar/stan/no_image.png');

			$query = $this->db->where('id_stan', $id);
			$query = $this->db->update('stan', $data);
			$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
											 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											 Gambar2 Berhasil Dihapus</div>');
			redirect ('admin/stan/editView/'.$id);
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function gambar3($id){
		if($this->session->userdata('akses'))
		{
			$target_Path = NULL;
			if ($_FILES['gambar3']['name'] != NULL)
			{
					$target_Path = "assets/gambar/stan/";
					$string = basename( $_FILES['gambar3']['name'] );
					$string = str_replace(" ","-", $string);
					$target_Path = $target_Path.$string;
			}
			if($target_Path!==NULL)
			{
				$data = array(
					'GAMBAR3' => $target_Path);

				$query = $this->db->where('id_stan', $id);
				$query = $this->db->update('stan', $data);
				if($query)
				{
					if ($target_Path != NULL) {
						move_uploaded_file( $_FILES['gambar3']['tmp_name'], $target_Path );
					}
					$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar3 Berhasil Diupdate</div>');
					redirect ('admin/stan/editView/'.$id);
				}
				else
				{
					$this->session->set_flashdata('gagalstan', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Gambar3 Gagal Diupdate</div>');
					redirect ('admin/stan/editView/$id');
				}
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusgambar3($id){
		if($this->session->userdata('akses'))
		{
			$data = array(
				'GAMBAR3' => 'assets/gambar/stan/no_image.png');

			$query = $this->db->where('id_stan', $id);
			$query = $this->db->update('stan', $data);
			$this->session->set_flashdata('suksesstan', '<div class="col-sm-12 alert alert-success fade in">
											 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											 Gambar3 Berhasil Dihapus</div>');
			redirect ('admin/stan/editView/'.$id);
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusStan($id){
		if($this->session->userdata('akses'))
		{
			$this->Model_stan->delete_data($id);
			redirect('admin/stan');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
