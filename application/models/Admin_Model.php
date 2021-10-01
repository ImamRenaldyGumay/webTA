<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
  public function getNama()
  {
    $query = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }
}
