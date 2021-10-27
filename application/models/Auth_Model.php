<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
  public function prosesRegistrasi($data)
  {
    $this->db->insert('tb_user', $data);
  }

  public function cek_login($where)
  {
    $query = $this->db->get_where('tb_user', $where);
    return $query;
  }

  // function create($table, $data)
  // {
  //   $query = $this->db->insert($table, $data);
  //   return $this->db->insert_id(); // return last insert id
  // }
}
