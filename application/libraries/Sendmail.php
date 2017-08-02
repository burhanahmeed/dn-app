<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail {
	protected $CI;
	 public function __construct()
        {
            $this->CI =& get_instance();   

			// $this->load->helper('url');
			// $this->load->library('session');
			// $this->config->item('base_url');
			// $this->CI->load->library('email');
        }

        public function chgStatus($mailto, $team)
        {
        	$from_email = 'support@diesnat-kopmaits.com'; //change this to yours
	        $to_email = $mailto;
	        $subject = '[DN35 Status Verified]';
	        $message = '
	        <head>
          <style>
	        	body{
  margin:0;
}
.header{
  position:relative;
  width:100%;
  height:100px;
  background-color: #028028;
}
.header img{
  width:60px;
  padding:10px;
  padding-left:30px;
}
.header a{
  float:right;
  padding:20px;
  padding-top:40px;
  text-decoration:none;
  color:  white;
}
.header h3{
  color:white;
  position:absolute;
  display:inline-block;
  top:10px;
  text-align:center;
  margin:0 auto;
  padding:20px;
}
.isi{
  margin: 10px;
  padding: 5px;
  position :relative;
}
	        </style>
          </head>
			<body>
<div class="header">
  <img src="https://image.ibb.co/ncxPZa/dnlogo.png" >
  <h3>Diesnatalis Kopma ITS ke 35</h3>
  <a href="">Visit Website</a>
</div>
  <div class="isi">
    <p>Dear tim '.$team.',</p>
    <p>Selamat tim Anda telah resmi diverifikasi menjadi peserta Diesnatalis Kopma ITS ke-35. Kami ingin menginformasikan bahwa masa pengumpulan essay untuk EnC Competition dan Business Plan dapat dilakukan hingga batas akhir pendaftaran ditutup.</p>

<p>Peserta sangat dianjurkan untuk membaca Rulebook/Guidebook kompetisi yang berisi aturan dan ketentuan jalannya kompetisi. Rulebook/guidebook dapat diakses di <a href="http://kusia.ga/RULEBOOKDEBAT" target="blank">http://kusia.ga/RULEBOOKDEBAT</a> untuk EnC Debate Competition, <a href="http://kusia.ga/RULEBOOKBISPLAN" target="blank">http://kusia.ga/RULEBOOKBISPLAN</a> untuk Business Plan Competition, dan <a href="http://kusia.ga/RULEBOOKCERCER" target="blank">http://kusia.ga/RULEBOOKCERCER</a> untuk Cooperative Competition</p>

<p>Demikian informasi yang dapat kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.
</p>
    <h6>Regards,<br>
   Panitia DN35<br>
   Kopma dr.Angka ITS<br>
    Institut Teknologi Sepuluh Nopember Surabaya</h6>
    </p>
  </div>
</body>
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
	        $this->CI->email->initialize($config);
	        
	        //send mail
	        $this->CI->email->from($from_email, 'DN35 Administrator');
	        $this->CI->email->to($to_email);
	        $this->CI->email->subject($subject);
	        $this->CI->email->message($message);
	        $this->CI->email->send();
        }
}