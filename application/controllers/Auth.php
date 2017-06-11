<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model');
    }

	public function index()
	{
		$this->load->view('peserta/login');
	}

	function do_login(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		$usname = htmlspecialchars($this->input->post('email'));
		$pass = md5(htmlspecialchars($this->input->post('pass')));
		if ($this->form_validation->run()) {
			$cek = $this->Auth_model->cekLogin($usname,$pass);
			if ($cek == TRUE) {
				$getter = $this->Auth_model->getData($usname);
				$sess = array(
					'email'=>$getter[0]->email,
					'id'=>$getter[0]->id,
					'date'=>$getter[0]->date,
					'debat'=>$getter[0]->debat,
					'bisplan'=>$getter[0]->bisplan,
					'cercer'=>$getter[0]->cercer);
				$this->session->set_userdata('login',$sess);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('errLogin','Email or Password are Incorrect');
				redirect('/');
			}
		}else{
			$this->session->set_flashdata('errLogin','Email or Password are Incorrect');
			redirect('/');
		}
	}
	function do_register(){

		$this->load->database();
		$this->form_validation->set_rules('emails','email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pass','Password','required|trim|matches[cpass]|min_length[8]');
		$this->form_validation->set_rules('cpass','Confirm Password','required|trim');
		$this->form_validation->set_message('is_unique', 'Your %s already registered, please use other email');
		$data = array(
			'email'=>htmlspecialchars($this->input->post('emails')),
			'password'=> md5(htmlspecialchars($this->input->post('pass'))),
			'date'=> date('Y-m-d H:i:sa'));

		if ($this->form_validation->run()) {
			$this->Auth_model->register($data);
			$this->session->set_flashdata('sucRegis','Succesfully registered, Please Login');
			redirect('/');
		}else{
			$this->session->set_flashdata('errRegis',validation_errors());
			redirect('/');
		}
	}

	function logout(){
		$this->session->unset_userdata('login');
	    // $this->session->session_destroy();
	    redirect('/');
	}

	function forgot(){
		$this->form_validation->set_rules('emails','Email','required|valid_email');
		if ($this->form_validation->run()==false) {
			$this->session->set_flashdata('errRegis', validation_errors());
			redirect('/');
		}else{
			$mail = $this->input->post('emails');
			$cek = $this->Auth_model->getData($mail);
			if ($cek == false) {
				$this->session->set_flashdata('errRegis', 'We can not find your email you entered');
				redirect('/');
			}
			$token = $this->Auth_model->inserttoken($cek[0]->id);
			$qstring =  $this->base64url_encode($token);
			$url = base_url().'reset/'.$qstring;

			$from_email = 'support@diesnat-kopmaits.com'; //change this to yours
	        $to_email = $mail;
	        $subject = '[DN35 Password Reset]';
	        $message = '
				<style>
				body {
				    padding: 0;
				    margin: 0;
				}

				html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
				@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
				    *[class="table_width_100"] {
						width: 96% !important;
					}
					*[class="border-right_mob"] {
						border-right: 1px solid #dddddd;
					}
					*[class="mob_100"] {
						width: 100% !important;
					}
					*[class="mob_center"] {
						text-align: center !important;
					}
					*[class="mob_center_bl"] {
						float: none !important;
						display: block !important;
						margin: 0px auto;
					}	
					.iage_footer a {
						text-decoration: none;
						color: #929ca8;
					}
					img.mob_display_none {
						width: 0px !important;
						height: 0px !important;
						display: none !important;
					}
					img.mob_width_50 {
						width: 40% !important;
						height: auto !important;
					}
				}
				.table_width_100 {
					width: 680px;
				}
				</style>

				<!--
				Responsive Email Template by @keenthemes
				A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
				Licensed under MIT
				-->

				<div id="mailsub" class="notification" align="center">

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


				<!--[if gte mso 10]>
				<table width="680" border="0" cellspacing="0" cellpadding="0">
				<tr><td>
				<![endif]-->

				<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
				    <tr><td>
					<!-- padding -->
					</td></tr>
					<!--header -->
					<tr><td align="center" bgcolor="#ffffff">
						<!-- padding -->
						<table width="90%" border="0" cellspacing="0" cellpadding="0"><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
							<tr><td align="center">
							    		<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 13px;">
													<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
													</font></a>
									</td>
									<td align="right">
								<!--[endif]--><!-- 

							</td>
							</tr>
						</table>
						<!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
					</td></tr>
					<!--header END-->

					<!--content 1 -->
					<tr><td align="center" bgcolor="#fbfcfd">
						<table width="90%" border="0" cellspacing="0" cellpadding="0">
							<tr><td align="center">
								<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
								<div style="line-height: 44px;">
									<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
									<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
										Reset Your Password
									</span></font>
								</div>
								<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
							</td></tr>
							<tr><td align="center">
								<div style="line-height: 24px;">
									<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
									<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
										Silahkan klik tombol dibawah ini untuk melakukan reset password
									</span></font>
								</div>
								<!-- padding --><div style="height: 10px; line-height: 40px; font-size: 10px;"></div>
							</td></tr>
							<tr><td align="center">
								<div style="line-height: 24px;">
									<a href="'.$url.'" target="_blank" class="btn btn-danger block-center">
									    Reset
									</a>
								</div>
				        <div style="margin-top:30px">
				        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				        Atau dengan melakukan copy paste link dibawah ini ke browser</span>
								  <a href="'.$url.'" target="_blank" class="btn btn-danger block-center">
									    '.$url.'
									</a>
				        </div>

								<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
							</td></tr>
						</table>		
					</td></tr>
					<!--content 1 END-->


					<!--footer -->
					<tr><td class="iage_footer" align="center" bgcolor="#ffffff">

						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr><td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
								<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
								Template by	Metronic. ALL Rights Reserved.
								</span></font>				
							</td></tr>			
						</table>
						

					</td></tr>
					<!--footer END-->
					<tr><td>

					</td></tr>
				</table>
				<!--[if gte mso 10]>
				</td></tr>
				</table>
				<![endif]-->
				 
				</td></tr>
				</table>
	        ';
	        
	        //configure email settings
	        $config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'ssl://srv28.niagahoster.com'; //smtp host name
	        $config['smtp_port'] = '465'; //smtp port number
	        $config['smtp_user'] = $from_email;
	        $config['smtp_pass'] = 'diesnatkopma35'; //$from_email password
	        $config['mailtype'] = 'html';
	        $config['charset'] = 'iso-8859-1';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n"; //use double quotes
	        $this->email->initialize($config);
	        
	        //send mail
	        $this->email->from($from_email, 'DN35 Reset Password');
	        $this->email->to($to_email);
	        $this->email->subject($subject);
	        $this->email->message($message);
	        $this->email->send();

	        $this->session->set_flashdata('sucRegis', 'Please check your email to reset your password');
			redirect('/');
		}
	}

	function redirect_reset($token=""){
		if (empty($token)) {
			redirect('/');
		}
		$token = $this->base64url_decode($token);
		if ($this->Auth_model->istokenvalid($token)==false) {
			$this->session->set_flashdata('errRegis', 'Your token is invalid or your token is expired');
			redirect('/');
		}
		$this->load->view('peserta/reset', array('token'=>$this->base64url_encode($token)));
	}
	function do_reset($token){
		$token = $this->base64url_decode($token);
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|matches[pass]');
        if ($this->form_validation->run()==false) {
        	$this->session->set_flashdata('errLogin', validation_errors());
        	redirect('reset/'.$this->base64url_encode($token));
        }else{
        	if ($this->Auth_model->istokenvalid($token)==false) {
				$this->session->set_flashdata('errRegis', 'Your token is invalid or your token is expired');
				redirect('/');
			}
			$id = substr($token, 30);
			$data = array(
				'password'=>md5($this->input->post('pass')));
			$this->Auth_model->updateLogin($data,$id);
			$this->Auth_model->updateToken($token);
			$this->session->set_flashdata('sucRegis', 'Your password succesfully updated');
			redirect('/');
        }
	}
	public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 
    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }
}
