<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comp extends CI_Controller {


	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Competisi_model');
    }
	public function index()
	{
		$this->load->view('peserta/login');
	}
	function register_bisplan(){
		$this->load->database();
		$this->form_validation->set_rules('tim','Team Name','required|is_unique[bisplan_db.nama_tim]');
		$this->form_validation->set_rules('nama1','Nama Ketua','required');
		$this->form_validation->set_rules('nim1','NIM Ketua','required');
		$this->form_validation->set_rules('nama2','Nama Anggota 1','required');
		$this->form_validation->set_rules('nim2','NIM Anggota 1','required');
		$this->form_validation->set_rules('asal','Asal Universitas','required');
		$this->form_validation->set_rules('kontak','Kontak Ketua','required');
		$this->form_validation->set_message('required','%s cannot be empty');
		$this->form_validation->set_message('is_unique','%s has been used, please user another');
		$tim = $this->input->post('tim');
		$nama1 = $this->input->post('nama1');
		$nim1 = $this->input->post('nim1');
		$nama2 = $this->input->post('nama2');
		$nim2 = $this->input->post('nim2');
		$nama3 = $this->input->post('nama3');
		$nim3 = $this->input->post('nim3');
		$asal = $this->input->post('asal');
		$kontak = $this->input->post('kontak');
		
		do{
		    $kode = $this->randString();
		    $num = $this->Competisi_model->cekrand($kode,'bisplan_db');
		}while($num>=1);

		$data = array(
			'uid'=> $this->session->userdata('login')['id'],
			'nama_tim'=>$tim,
			'ketua'=>$nama1,
			'nim_ketua'=>$nim1,
			'anggota1'=>$nama2,
			'nim_a1'=>$nim2,
			'anggota2'=>$nama3,
			'nim_a2'=>$nim3,
			'asal_univ'=>$asal,
			'kontak'=>$kontak,
			'status'=>'1',
			'id'=> $kode
			);
		$dataUser = array(
			'bisplan'=>1);
		
		if ($this->form_validation->run()) {
			$this->Competisi_model->insert_bisplan($data);
			$this->Competisi_model->updateStatus($dataUser,$data['uid']);
			$outter = array(
				'msg'=>'Thank You for Registering to DN35',
				'res'=>1,
				'url'=>base_url().'competition');
			echo json_encode($outter);
		}else{
			$outter = array(
				'msg'=>validation_errors(),
				'res'=>0);
			echo json_encode($outter);
		}
	}

	function register_debat(){
		$this->load->database();
		$this->form_validation->set_rules('tim','Team Name','required|is_unique[bisplan_db.nama_tim]');
		$this->form_validation->set_rules('nama1','Nama Ketua','required');
		$this->form_validation->set_rules('nim1','NIM Ketua','required');
		$this->form_validation->set_rules('nama2','Nama Anggota 1','required');
		$this->form_validation->set_rules('nim2','NIM Anggota 1','required');
		$this->form_validation->set_rules('asal','Asal Universitas','required');
		$this->form_validation->set_rules('kontak','Kontak Ketua','required');
		$this->form_validation->set_message('required','%s cannot be empty');
		$this->form_validation->set_message('is_unique','%s has been used, please user another');
		$tim = $this->input->post('tim');
		$nama1 = $this->input->post('nama1');
		$nim1 = $this->input->post('nim1');
		$nama2 = $this->input->post('nama2');
		$nim2 = $this->input->post('nim2');
		$nama3 = $this->input->post('nama3');
		$nim3 = $this->input->post('nim3');
		$asal = $this->input->post('asal');
		$kontak = $this->input->post('kontak');
		
		do{
		    $kode = $this->randString();
		    $num = $this->Competisi_model->cekrand($kode,'debat_db');
		}while($num>=1);

		$data = array(
			'uid'=> $this->session->userdata('login')['id'],
			'nama_tim'=>$tim,
			'ketua'=>$nama1,
			'nim_ketua'=>$nim1,
			'anggota1'=>$nama2,
			'nim_a1'=>$nim2,
			'anggota2'=>$nama3,
			'nim_a2'=>$nim3,
			'asal_univ'=>$asal,
			'kontak'=>$kontak,
			'status'=>'1',
			'id'=> $kode
			);
		$dataUser = array(
			'debat'=>1);
		
		if ($this->form_validation->run()) {
			$this->Competisi_model->insert_db_comp('debat_db',$data);
			$this->Competisi_model->updateStatus($dataUser,$data['uid']);
			$outter = array(
				'msg'=>'Thank You for Registering to DN35',
				'res'=>1,
				'url'=>base_url().'competition');
			echo json_encode($outter);
		}else{
			$outter = array(
				'msg'=>validation_errors(),
				'res'=>0);
			echo json_encode($outter);
		}
	}

		function register_cercer(){
		$this->load->database();
		$this->form_validation->set_rules('tim','Team Name','required|is_unique[bisplan_db.nama_tim]');
		$this->form_validation->set_rules('nama1','Nama Ketua','required');
		$this->form_validation->set_rules('nim1','NIM Ketua','required');
		$this->form_validation->set_rules('nama2','Nama Anggota 1','required');
		$this->form_validation->set_rules('nim2','NIM Anggota 1','required');
		$this->form_validation->set_rules('asal','Asal Sekolah','required');
		$this->form_validation->set_rules('kontak','Kontak Ketua','required');
		$this->form_validation->set_message('required','%s cannot be empty');
		$this->form_validation->set_message('is_unique','%s has been used, please user another');
		$tim = $this->input->post('tim');
		$nama1 = $this->input->post('nama1');
		$nim1 = $this->input->post('nim1');
		$nama2 = $this->input->post('nama2');
		$nim2 = $this->input->post('nim2');
		$nama3 = $this->input->post('nama3');
		$nim3 = $this->input->post('nim3');
		$asal = $this->input->post('asal');
		$kontak = $this->input->post('kontak');
		
		do{
		    $kode = $this->randString();
		    $num = $this->Competisi_model->cekrand($kode,'cercer_db');
		}while($num>=1);

		$data = array(
			'uid'=> $this->session->userdata('login')['id'],
			'nama_tim'=>$tim,
			'ketua'=>$nama1,
			'nim_ketua'=>$nim1,
			'anggota1'=>$nama2,
			'nim_a1'=>$nim2,
			'anggota2'=>$nama3,
			'nim_a2'=>$nim3,
			'asal_univ'=>$asal,
			'kontak'=>$kontak,
			'status'=>'1',
			'id'=> $kode
			);
		$dataUser = array(
			'cercer'=>1);
		
		if ($this->form_validation->run()) {
			$this->Competisi_model->insert_db_comp('cercer_db',$data);
			$this->Competisi_model->updateStatus($dataUser,$data['uid']);
			$outter = array(
				'msg'=>'Thank You for Registering to DN35',
				'res'=>1,
				'url'=>base_url().'competition');
			echo json_encode($outter);
		}else{
			$outter = array(
				'msg'=>validation_errors(),
				'res'=>0);
			echo json_encode($outter);
		}
	}

	function randString(){

		 $characters = '1234567890QWERTYUIOPLKJHGFDSAZXCVBNM';
		 $string = '';
		 $max = strlen($characters) - 1;
		 for ($i = 0; $i < 6; $i++) {
		      $string .= $characters[mt_rand(0, $max)];
		 }
		 return $string;
	}
}
