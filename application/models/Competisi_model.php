<?php
class Competisi_model extends CI_Model {

        public function __construct(){
                parent::__construct();
                $this->load->database();
        }

        function insert_bisplan($data){
                $this->db->insert('bisplan_db',$data);
        }

        function insert_db_comp($tabel,$data){
                $this->db->insert($tabel,$data);
        }

        function cekrand($kode,$tabel){
                $this->db->where('id', $kode);
                $this->db->from($tabel);
                $num = $this->db->count_all_results();
                return $num;
        }
        function updateStatus($data,$id){
                $this->db->where('id',$id);
                $this->db->update('user',$data);
        }
        function getTim($tabel,$id,$f){
                $this->db->select($f)
                        ->from($tabel)
                        ->join('status','status.id='.$tabel.'.status','left')
                        ->where('uid',$id)
                        ->limit(1);
                $query = $this->db->get();
                return $query->result();
        }
        function update_lomba($id, $tabel,$isi){
                $this->db->where('id',$id);
                $this->db->update($tabel,$isi);
        }
        function insert_submit($data){
                $this->db->insert('file_upload',$data);
        }
        function getLatestFile($code,$jenis){
                $query = $this->db->select('path')
                        ->from('file_upload')
                        ->where('kode',$code)
                        ->where('jenis_event',$jenis)
                        ->limit(1)
                        ->order_by('id', 'DESC')
                        ->get();
                if ($query->num_rows() >= 1) {
                        return $query->result();
                }else{
                        return null;
                }
        }
        function getLatestFileSem($code){
                $query = $this->db->select('path')
                        ->from('file_upload')
                        ->where('kode',$code)
                        ->where('jenis_event','bisplan-s')
                        ->limit(1)
                        ->order_by('id', 'DESC')
                        ->get();
                if ($query->num_rows() >= 1) {
                        return $query->result();
                }else{
                        return null;
                }
        }
        function getAnn($jenis){
                $this->db->select('*')
                        ->where('jenis',$jenis) 
                        // jenis ada 3: bisplan, cercer, debat, general
                        ->from('announcer')
                        ->order_by('date','DESC');
                return $this->db->get()->result();
        }
        function updateLomba($data, $table, $where){
                $this->db->where($where);
                $this->db->update($table,$data);
        }
}

?>