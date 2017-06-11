<?php
class Auth_model extends CI_Model {

        public function __construct(){
                parent::__construct();
                $this->load->database();
        }

        public function cekLogin($user,$pass){
        $query = $this->db->select('*')
                        ->from('user')
                        ->where('email',$user)
                        ->where('password',$pass)
                        ->limit(1)
                        ->get();
                if ($query->num_rows() == 1) {
                        return true;
                }else{
                        return false;
                }
        }

        public function getData($user){
        $query = $this->db->select('*')
                        ->from('user')
                        ->where('email',$user)
                        // ->limit(1)
                        ->get();
                if ($query->num_rows() == 1) {
                        return $query->result();
                }else{
                        return false;
                }
        }

        function register($data){
                $this->db->insert('user',$data);
                return true;
        }

        public function getDataId($id){
        $query = $this->db->select('*')
                        ->from('user')
                        ->where('id',$id)
                        ->limit(1)
                        ->get();
                if ($query->num_rows() == 1) {
                        return $query->result();
                }else{
                        return false;
                }
        }
        function inserttoken($id){
                $token = substr(sha1(rand()), 0, 30); 
                $date = date('Y-m-d H:i:s');
                $data = array(
                        'token'=>$token,
                        'uid'=>$id,
                        'date'=>$date);
                $this->db->insert('tokens',$data);
                return $token.$id;
        }
        function updateToken($token){
                $tkn = substr($token, 0,30);
                $id = substr($token, 30);
                $this->db->where('token',$tkn);
                $this->db->where('uid',$id);
                $this->db->update('tokens', array('status'=>0));
        }
        function istokenvalid($token){
                $tkn = substr($token, 0,30);
                $id = substr($token, 30);

                $a = $this->db->get_where('tokens',array('token'=>$tkn, 'uid'=>$id));

                if ($this->db->affected_rows()>0) {
                        $row = $a->row();
                        $add = 15 * 60 * 1000;
                        $date = strtotime($row->date)+$add;
                        $now = strtotime(date('Y-m-d H:i:s'));

                        if ($date < $now) {
                                return false;
                        }
                        if ($row->status == 0) {
                                return false;
                        }

                        return true;
                }else{
                        return false;
                }
        }

        function updateLogin($data,$id){
                $this->db->where('id',$id);
                $this->db->update('user',$data);
        }

}

?>