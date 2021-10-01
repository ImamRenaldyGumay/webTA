<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
  public function prosesRegistrasi($data)
  {
    $this->db->insert('user', $data);
  }

  public function cek_login($where)
  {
    $query = $this->db->get_where('user', $where);
    return $query;
  }
}
