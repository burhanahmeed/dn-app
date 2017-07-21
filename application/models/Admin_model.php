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

}
