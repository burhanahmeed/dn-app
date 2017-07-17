<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
       $this->load->model('Model_produk');
			 if($this->session->userdata('type') != 'admin'){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if($this->session->userdata('akses'))
				{
					$this->load->view('admin/header');
					$data['produk'] = $this->Model_produk->gettable_sort("produk", "id_produk");
					$this->load->view('admin/produk/readProduk', $data);
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
					$this->load->view('admin/produk/createProduk');
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
					$data['edit'] = $this->Model_produk->get_data_id($id);
					$this->load->view('admin/produk/updateProduk', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function createProduk(){
		if($this->session->userdata('akses'))
    {
				$target_Path = NULL;
				if ($_FILES['gambar']['name'] != NULL)
				{
						$target_Path = "assets/gambar/produk/";
						$string = basename( $_FILES['gambar']['name'] );
						$string = str_replace(" ","-", $string);
						$target_Path = $target_Path.$string;
				}

			if($target_Path!=NULL){
				$data = array(
					'ID_PRODUK'=> $this->input->post('id_produk'),
					'NAMA_PRODUK'=> $this->input->post('nama_produk'),
					'GAMBAR' => $target_Path,
					'KONTEN' => $this->input->post('konten'));

					$query = $this->Model_produk->insert('produk', $data);
			}

			if($query)
			{
				if ($target_Path != NULL) {
					move_uploaded_file( $_FILES['gambar']['tmp_name'], $target_Path );
				}
				$this->session->set_flashdata('suksesproduk', '<div class="col-sm-12 alert alert-success fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Produk Berhasil Disimpan</div>');
				redirect ('admin/produk');
			}else
			{
				$this->session->set_flashdata('gagalproduk', '<div class="col-sm-12 alert alert-danger fade in">
												 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												 Produk Gagal Disimpan</div>');
				redirect ('admin/produk/createView');
			}
		}else
		{
				redirect('admin/dashboard');
		}
	}

	public function editProduk($id){
		if($this->session->userdata('akses'))
    {
			$target_Path = NULL;
			if ($_FILES['gambar']['name'] != NULL)
			{
				$target_Path = "assets/gambar/produk/";
				$string = basename( $_FILES['gambar']['name'] );
				$string = str_replace(" ","-", $string);
				$target_Path = $target_Path.$string;
			}
			if ($_FILES['gambar']['name'] == NULL){
				$data = array(
					'NAMA_PRODUK'=> $this->input->post('nama_produk'),
					'KONTEN' => $this->input->post('konten'));

				$query = $this->db->where('id_produk', $id);
				$query = $this->db->update('produk', $data);
				if($query)
				{
					$this->session->set_flashdata('suksesproduk', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Produk Berhasil Diupdate</div>');
					redirect ('admin/produk');
				}
				else
				{
					$this->session->set_flashdata('gagalproduk', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Slider Gagal Disimpan</div>');
					redirect ('admin/produk/editView/$id');
				}
			}
			if($target_Path!=NULL)
			{
				$data = array(
					'NAMA_PRODUK'=> $this->input->post('nama_produk'),
					'GAMBAR' => $target_Path,
					'KONTEN' => $this->input->post('konten'));

				$query = $this->db->where('id_produk', $id);
				$query = $this->db->update('produk', $data);
				if($query)
				{
					if ($target_Path != NULL) {
						move_uploaded_file( $_FILES['gambar']['tmp_name'], $target_Path );
					}
					$this->session->set_flashdata('suksesproduk', '<div class="col-sm-12 alert alert-success fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Produk Berhasil Diupdate</div>');
					redirect ('admin/produk');
				}
				else
				{
					$this->session->set_flashdata('gagalproduk', '<div class="col-sm-12 alert alert-danger fade in">
													 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													 Produk Gagal Disimpan</div>');
					redirect ('admin/produk/editView/$id');
				}
			}
		} else
		{
				redirect('admin/dashboard');
		}
	}

	public function hapusProduk($id){
		if($this->session->userdata('akses'))
		{
			$this->Model_produk->delete_data($id);
			redirect('admin/produk');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
