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
                        ->limit(1)
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

}

?>