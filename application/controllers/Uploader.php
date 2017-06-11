<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {

	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Competisi_model');
    }

    function upload_data($param,$code){
    	switch ($param) {
    		case 'bisplan':
    		$config['upload_path']   = './uploads/bisplan/'; 
	        $config['allowed_types'] = 'zip'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'DATA_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('datadiri')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and ZIP extension. Please Check again'); 
	           redirect('competition/bisplan') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('verifikasi' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'bisplan_db',$data);
	           redirect('competition/bisplan') ;
	        } 
    			break;
    		
    		case 'debat':
    		$config['upload_path']   = './uploads/debat/'; 
	        $config['allowed_types'] = 'zip'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'DATA_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('datadiri')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and ZIP extension. Please Check again'); 
	           redirect('competition/debat') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('verifikasi' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'debat_db',$data);
	           redirect('competition/debat') ;
	        } 
    			break;

    		case 'cercer':
    		$config['upload_path']   = './uploads/cercer/'; 
	        $config['allowed_types'] = 'zip'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'DATA_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('datadiri')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and ZIP extension. Please Check again'); 
	           redirect('competition/cercer') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('verifikasi' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'cercer_db',$data);
	           redirect('competition/cercer') ;
	        } 
    			break;
    	}
    }

    function upload_bayar($param,$code){
    	switch ($param) {
    		case 'bisplan':
    		$config['upload_path']   = './uploads/bisplan/'; 
	        $config['allowed_types'] = 'jpg|png|jpeg'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BAYAR_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('bayar')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and JPG/PNG/JPEG extension. Please Check again'); 
	           redirect('competition/bisplan') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('pembayaran' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'bisplan_db',$data);
	           redirect('competition/bisplan') ;
	        } 
    			break;
    		
    		case 'debat':
    		$config['upload_path']   = './uploads/debat/'; 
	        $config['allowed_types'] = 'jpg|png|jpeg'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BAYAR_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('bayar')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and JPG/PNG/JPEG extension. Please Check again'); 
	           redirect('competition/debat') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('pembayaran' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'debat_db',$data);
	           redirect('competition/debat') ;
	        } 
    			break;

    		case 'cercer':
    		$config['upload_path']   = './uploads/cercer/'; 
	        $config['allowed_types'] = 'jpg|png|jpeg'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BAYAR_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('bayar')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and JPG/PNG/JPEG extension. Please Check again'); 
	           redirect('competition/cercer') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array('pembayaran' => $this->upload->data('file_name')); 
	           $this->Competisi_model->update_lomba($code, 'cercer_db',$data);
	           redirect('competition/cercer') ;
	        } 
    			break;
    	}
    }
    function submission($param, $code){
    	$lid = $this->session->userdata('login')['id'];

    	switch ($param) {
    		case 'bisplan':
    		$getter = $this->Competisi_model->getTim('bisplan_db',$lid,'nama_tim');
    		$nama_tim = $getter[0]->nama_tim;
    		$config['upload_path']   = './uploads/submit_bisplan/'; 
	        $config['allowed_types'] = 'pdf'; 
	        $config['max_size']      = 20000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BISPLAN_'.$nama_tim.'_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('submission')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 20MB and PDF extension. Please Check again'); 
	           redirect('competition/bisplan') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array(
		        	'path' => 'uploads/submit_bisplan/'.$this->upload->data('file_name'),
		        	'kode'=>$code,
		        	'jenis_event'=> 'bisplan',
		        	'timestamp'=>date('Y-m-d H:i:sa')); 
	           $this->Competisi_model->insert_submit($data);
	           redirect('competition/bisplan') ;
	        } 
    			break;
    		
    		case 'debat':
    		$config['upload_path']   = './uploads/debat/'; 
	        $config['allowed_types'] = 'jpg|png|jpeg'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BAYAR_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('bayar')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and JPG/PNG/JPEG extension. Please Check again'); 
	           redirect('competition/debat') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array(
		        	'path' => 'uploads/submit_debat/'.$this->upload->data('file_name'),
		        	'kode'=>$code,
		        	'jenis_event'=> 'debat',
		        	'timestamp'=>date('Y-m-d H:i:sa')); 
	           $this->Competisi_model->insert_submit($data);
	           redirect('competition/debat') ;
	        } 
    			break;

    		case 'cercer':
    		$config['upload_path']   = './uploads/cercer/'; 
	        $config['allowed_types'] = 'jpg|png|jpeg'; 
	        $config['max_size']      = 5000;
	        $config['overwrite'] = false;
	        $config['file_name'] = 'BAYAR_'.$code.'-';
	        $this->load->library('upload', $config);
				
	        if ( ! $this->upload->do_upload('bayar')) {
	           $this->session->set_flashdata('errUp', 'The maximum size is 4MB and JPG/PNG/JPEG extension. Please Check again'); 
	           redirect('competition/cercer') ;
	        }				
	        else { 
		        $this->session->set_flashdata('succUp', 'File uploaded successfully'); 
		        $data = array(
		        	'path' => 'uploads/submit_cercer/'.$this->upload->data('file_name'),
		        	'kode'=>$code,
		        	'jenis_event'=> 'cercer',
		        	'timestamp'=>date('Y-m-d H:i:sa')); 
	           $this->Competisi_model->insert_submit($data);
	           redirect('competition/cercer') ;
	        } 
    			break;
    	}
    }
}