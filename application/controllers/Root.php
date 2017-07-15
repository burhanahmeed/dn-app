<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {

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
	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model');
        $this->load->model('Competisi_model');
    }
	public function index()
	{
		$this->load->view('peserta/login');
	}
	function dashboard(){
		$lid = $this->session->userdata('login')['id'];
		$get_sess = $this->Auth_model->getDataId($lid);
		$bp = $get_sess[0]->bisplan;
		$db = $get_sess[0]->debat;
		$cc = $get_sess[0]->cercer;
		$data = array(
			'title'=> 'Dashboard DN35');
		$dataIsi = array(
			'bp'=>$bp,
			'db'=>$db,
			'cc'=>$cc);
		if ($bp==1 && $db==0 && $cc==0) {
			$fields = 'bisplan_db.id, bisplan_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status';
			$bisplan = $this->Competisi_model->getTim('bisplan_db',$lid,$fields);
			$dataIsi['bisplan'] = $bisplan[0];
		}elseif ($bp==0 && $db==1 && $cc==0) {
			$fields = 'debat_db.id, debat_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status';
			$debat = $this->Competisi_model->getTim('debat_db',$lid,$fields);
			$dataIsi['debat'] = $debat[0];
		}elseif ($bp==1 && $db==1 && $cc==0) {
			$fields = 'bisplan_db.id, bisplan_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status';
			$fields2 = 'debat_db.id, debat_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status';
			$bisplan = $this->Competisi_model->getTim('bisplan_db',$lid,$fields);
			$debat = $this->Competisi_model->getTim('debat_db',$lid,$fields2);
			$dataIsi['bisplan'] = $bisplan[0];
				$dataIsi['debat']= $debat[0];
				
		}elseif ($bp==0 && $db==0 && $cc==1) {
			$fields = 'cercer_db.id, cercer_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status';
			$cercer = $this->Competisi_model->getTim('cercer_db',$lid,$fields);
			$dataIsi['cercer'] = $cercer[0];
		}

		if (!$this->session->userdata('login')) {
			redirect('/');
		}else{
			$this->load->view('peserta/header',$data);
			if ($bp==0 && $db==0 && $cc==0) {
				$this->load->view('peserta/lomba',$dataIsi);
			}else{
				$this->load->view('peserta/dash',$dataIsi);
			}			
			$this->load->view('peserta/footer');
		}
	}

	function competition(){
		$lid = $this->session->userdata('login')['id'];
		$get_sess = $this->Auth_model->getDataId($lid);
		$bp = $get_sess[0]->bisplan;
		$db = $get_sess[0]->debat;
		$cc = $get_sess[0]->cercer;
		$data = array(
			'title'=> 'Competition DN35');
		$dataIsi = array(
			'bp'=>$bp,
			'db'=>$db,
			'cc'=>$cc);

		if (!$this->session->userdata('login')) {
			redirect('/');
		}else{
			$this->load->view('peserta/header',$data);
			if ($bp==0 && $db==0 && $cc==0) {
				$this->load->view('peserta/lomba');
			}else{
				$this->load->view('peserta/lomba-reg',$dataIsi);
			}			
			$this->load->view('peserta/footer');
		}
	}

	function register($param=""){
		$lid = $this->session->userdata('login')['id'];
		$get_sess = $this->Auth_model->getDataId($lid);
		$bp = $get_sess[0]->bisplan;
		$db = $get_sess[0]->debat;
		$cc = $get_sess[0]->cercer;
		if (!$this->session->userdata('login')) {
			redirect('/');
		}

		$data = array(
			'title'=> 'Competition Registration');

		$this->load->view('peserta/header',$data);
		switch ($param) {
			case 'bisplan':
			if ($bp==1) {
				redirect('competition');
			}else{
				$dataIsi = array(
					'judul'=>'Business Plan Competition',
					'sekolah'=>'Kampus',
					'no'=>'NIM',
					'url'=>base_url().'Comp/register_bisplan');
				$this->load->view('peserta/daftar',$dataIsi);
			}
				break;
			
			case 'debat':
				$dataIsi = array(
					'judul'=>'Debate Competition',
					'sekolah'=>'Kampus',
					'no'=>'NIM',
					'url'=>base_url().'Comp/register_debat');
				$this->load->view('peserta/daftar',$dataIsi);
				break;
			case 'cercer':
				$dataIsi = array(
					'judul'=>'Cerdas Cermat Competition',
					'sekolah'=>'Sekolah',
					'no'=>'No Induk',
					'url'=>base_url().'Comp/register_cercer');
				$this->load->view('peserta/daftar',$dataIsi);
				break;
		}
		$this->load->view('peserta/footer');
		$this->load->view('peserta/script');
	}

	function comp($lomba=""){
		$lid = $this->session->userdata('login')['id'];
		$ann = $this->Competisi_model->getAnn($lomba);
		if (!$this->session->userdata('login')) {
			redirect('/');
		}
		
		switch ($lomba) {
			case 'bisplan':
				$fields = 'bisplan_db.id, bisplan_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status,kontak,bisplan_db.status AS st, verifikasi, pembayaran, semifinal';
				$bisplan = $this->Competisi_model->getTim('bisplan_db',$lid,$fields);
				$get_latest_file = $this->Competisi_model->getLatestFile($bisplan[0]->id,'bisplan');
				$get_latest_filesem = $this->Competisi_model->getLatestFileSem($bisplan[0]->id);
				$data = array(
					'title'=> 'DN35 Business Plan');
				$dataIsi = array(
					'bisplan'=>$bisplan[0],
					'submission'=>$get_latest_file[0],
					'semis'=> $get_latest_filesem[0],
					'announce'=>$ann);
				$this->load->view('peserta/header',$data);
				$this->load->view('peserta/lomba-det',$dataIsi);
				break;
			
			case 'debat':
				$fields = 'debat_db.id, debat_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status,kontak,debat_db.status AS st, verifikasi, pembayaran';
				$bisplan = $this->Competisi_model->getTim('debat_db',$lid,$fields);
				$get_latest_file = $this->Competisi_model->getLatestFile($bisplan[0]->id,'debat');
				$data = array(
					'title'=> 'DN35 Debate Competition');
				$dataIsi = array(
					'bisplan'=>$bisplan[0],
					'submission'=>$get_latest_file[0],
					'announce'=>$ann);
				$this->load->view('peserta/header',$data);
				$this->load->view('peserta/lomba_debat',$dataIsi);
				break;

			case 'cercer':
				$fields = 'cercer_db.id, cercer_db.uid, nama_tim, asal_univ, ketua, nim_ketua, anggota1, nim_a1, anggota2, nim_a2, status.status,kontak,cercer_db.status AS st, verifikasi, pembayaran';
				$bisplan = $this->Competisi_model->getTim('cercer_db',$lid,$fields);
				$get_latest_file = $this->Competisi_model->getLatestFile($bisplan[0]->id,'cercer');
				$data = array(
					'title'=> 'DN35 Cerdas Cermat Competition');
				$dataIsi = array(
					'bisplan'=>$bisplan[0],
					'submission'=>$get_latest_file[0],
					'announce'=>$ann);
				$this->load->view('peserta/header',$data);
				$this->load->view('peserta/lomba_cercer',$dataIsi);
				break;
		}
		$this->load->view('peserta/footer');
	}
}
