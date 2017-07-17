<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
       $this->load->model('Model_pesan');
			 if($this->session->userdata('type') != 'admin'){
				 redirect('admin/dashboard');
			 }
  }

	public function index()
	{
		if($this->session->userdata('akses'))
				{
					//$data['pesan'] = $this->Model_pesan->gettable_sort("pesan", "id_pesan");
					$data['pesan'] = $this->Model_pesan->get_table();
					$this->load->view('admin/pesan/readPesan', $data);
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

	public function lihatPesan($id){
		if($this->session->userdata('akses'))
				{
					$data['edit'] = $this->Model_pesan->get_data_id($id);
					if($this->input->post('status') == 'UNREAD')
					{
						$this->db->set('status', 'READ');
						$this->db->where('id_pesan', $id);
						$this->db->update('pesan');
				  }
					$this->load->view('admin/header');
					$this->load->view('admin/pesan/lihatPesan', $data);
					$this->load->view('admin/footer');
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function balasPesan($id){
		if($this->session->userdata('akses'))
				{
				   //konfigurasi email
				   $config = array();
				   $config['charset'] = 'utf-8';
				   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
				   $config['protocol']= "smtp";
				   $config['mailtype']= "html";
				   $config['smtp_host']= "ssl://smtp.gmail.com";
				   $config['smtp_port']= "465";
				   $config['smtp_timeout']= "5";
				   $config['smtp_user']= "dcangkring17@gmail.com";              //isi dengan email anda
				   $config['smtp_pass']= "dc4ngkr1ng";            // isi dengan password dari email anda
				   $config['crlf']="\r\n";
				   $config['newline']="\r\n";

				   $config['wordwrap'] = TRUE;

				 //memanggil library email dan set konfigurasi untuk pengiriman email

				   $this->email->initialize($config);
				 //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
				   $this->email->from($this->input->post('from'));
				   $this->email->to($this->input->post('to'));
				   $this->email->subject($this->input->post('judul'));
				   $this->email->message($this->input->post('konten'));

				//proses uploads

				   $this->upload->initialize(array(
				                        "upload_path"   => "./uploads/",
				   "allowed_types" => "*"
				   ));

				// pernyataan jika pengiriman berhasil atau tidak

				   if($this->email->send())
				   {
						 $this->session->set_flashdata('suksespesan', '<div class="col-sm-12 alert alert-success fade in">
															<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															Pesan Balas Berhasil Dikirim</div>');
						 $this->db->set('status', 'REPLIED');
						 $this->db->where('id_pesan', $id);
						 $this->db->update('pesan');
						 redirect ('admin/pesan');
				   }else
				   {
						 $this->session->set_flashdata('gagalpesan', '<div class="col-sm-12 alert alert-danger fade in">
															<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															Pesan Balas Gagal Dikirim</div>');
						 redirect ('admin/pesan/lihatPesan/'.$id);
				   }
				}else
				{
						redirect('admin/dashboard');
				}
	}

	public function hapusPesan($id){
		if($this->session->userdata('akses'))
		{
			$this->Model_pesan->delete_data($id);
			redirect('admin/pesan');
		}else
		{
				redirect('admin/dashboard');
		}
	}

}
