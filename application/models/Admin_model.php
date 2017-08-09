<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct() {
  		parent::__construct();

  	}

    function login($username, $password)
    {
        $cek = $this->db->get_where('admin', array('username'=>$username, 'password'=>md5($password)));
        if($cek->num_rows()>0)
        {
          $data['akses'] = TRUE;
          $data['username'] = $cek->row()->username;
          $data['type'] = 'admin';
          $data['id'] = $cek->row()->id;
        } else
        {
          $data['akses'] = FALSE;
        }
          return $data;
    }

    public function get_table($table){
		    return $this->db->get($table)->result_array();
	  }

    public function get_data_id($table, $id)
    {
      $query = $this->db->get_where($table, array('uid' => $id));
      return $query->row_array();
    }

    public function insert($tablename, $where)
	  {
		    return $this->db->insert($tablename, $where);
	  }

    public function delete_data($table, $id)
    {
      return $this->db->delete($table, array('id'=>$id));
    }

    function getSubmisi($kategori){
      $query = $this->db->select('*')
      ->where('jenis_event', $kategori)
          ->from('file_upload')
          ->order_by('timestamp', 'DESC')
          ->get();
      return $query->result_array();
    }
    function getSubmisiAll(){
      $query = $this->db->select('*')
          ->from('file_upload')
          ->order_by('timestamp', 'DESC')
          ->get();
      return $query->result_array();
    }

    function updateDB($data, $dbName, $where){
      $this->db->where($where);
      $this->db->update($dbName ,$data);
    }

    function getUserID($table, $id){
      $query = $this->db->get_where($table, array('id' => $id));
      return $query->row_array();
    }
    function sortby($where, $table, $orby){
      $query = $this->db->select('*')
      ->where($where)
          ->from($table)
          ->order_by($orby)
          ->get();
      return $query->result_array();
    }

}
